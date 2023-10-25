const { useState, useEffect, StrictMode } = React;
function OptionsApp() {
    const showToast = (text, success) => {
        Toastify({
            text: text,
            className: success ? "success" : "error",
            gravity: "bottom",
            position: "center",
        })
            .showToast()
    }
    const [allKichThuoc, setAllKichThuoc] = useState([]);
    const [configs, setConfigs] = useState({});
    const [add, setAdd] = useState(false);
    const [modal, setModal] = useState(false);
    const [sidebar, setSidebar] = useState(false);
    const [allChatLieu, setAllChatLieu] = useState([]);
    const [detail, setDetail] = useState({});
    /** form Add */
    const formDefault = {
        length: 0,
        width: 0,
        product_id: PRODUCT_ID
    };
    const [formAdd, setFormAdd] = useState(formDefault);
    /** form Kich Thuoc Add */
    const formKTDefault = {
        kt_id: null,
        cl_id: null,
        ki_id: null,
        total_count_decal: 0,
        price_nl_m2: null,
        price_nl: null,
        idsCanMang: [],
        idsMatIn: [],
        idsQuyCach: [],
        idsSoluong: [],
        idsThoiGian: [],
    }
    const [formKT, setFormKT] = useState(formKTDefault);
    useEffect(() => {
        const getConfigs = async () => {
            await fetch(`${API}/get-configs.php`)
                .then(async (response) => await response.json())
                .then(async (response) => {
                    const { alls } = response;
                    setConfigs(alls);
                })
        }
        getConfigs();
    }, []);
    const getProductKichThuoc = async () => {
        await fetch(`${API}/get-kich-thuoc.php?productID=${PRODUCT_ID}`)
            .then(async (response) => await response.json())
            .then(async (response) => {
                console.log(response)
                const { success, alls } = response;
                setAllKichThuoc(alls);
            })
    }
    useEffect(() => {
        getProductKichThuoc();
    }, []);
    const openModal = (e, item) => {
        e.preventDefault();
        setModal(true);
        setDetail(item);
    }
    const saveKichThuocProduct = async (e) => {
        await fetch(`${API}/save-kich-thuoc.php`, {
            method: "POST",
            body: JSON.stringify(formAdd),
        }).then(response => response.json())
            .then(async (res) => {
                const { success, message } = res;
                await getProductKichThuoc();
                showToast(message, success);
            }).finally(() => {
                setAdd(false);
                setFormAdd(formDefault);
            });
    }
    const saveKichThuocOption = async (e) => {
        e.preventDefault();
        await fetch(`${API}/save-kich-thuoc-option.php`, {
            method: "POST",
            body: JSON.stringify(formKT),
        }).then(response => response.json())
            .then((res) => {
                const { success, message } = res;
                showToast(message, success);
            }).finally(() => {
                setFormKT(formKTDefault);
                setModal(false);
            });
    }
    const handleShowOption = async (e, item) => {
        e.preventDefault();
        await fetch(`${API}/get-option.php?kichThuocID=${item.id}`, {
            method: "GET",
        }).then(response => response.json())
            .then((res) => {
                setAllChatLieu(res.allChatLieu);
            }).finally(() => {
                setSidebar(true);
            });
    }
    return (
        <div>
            <div className="card card-primary card-outline text-sm mb-0">
                <div className="card-header">
                    <h3 className="card-title m-0  d-flex justify-content-between align-items-center" style={{
                        width: "100%",
                        float: "none"
                    }}>
                        <span>Danh sách các kích thước</span>
                        <button
                            onClick={() => setAdd(true)}
                            className="btn btn-sm bg-gradient-primary text-white" title="Thêm mới"><i className="fas fa-plus mr-2"></i>Thêm mới kích thước</button>
                    </h3>
                </div>
                <div className="card-body pb-3 pt-3">
                    <ul className="m-0 p-0">
                        {allKichThuoc && allKichThuoc.length > 0 && allKichThuoc.map(item => {
                            return (
                                <li className="d-flex justify-content-between align-items-center mb-3 border-bottom pb-1 pt-1" key={item.id}>
                                    <div className="box-info">
                                        <span>{item.length}mm x {item.width}mm</span>
                                    </div>
                                    <div className="box-action">
                                        <button className="btn btn-primary"
                                            onClick={(e) => {
                                                openModal(e, item);
                                                setFormKT({ ...formKT, kt_id: item.id });
                                            }}
                                            type="button">
                                            <span
                                                style={{
                                                    lineHeight: 1,
                                                }}
                                                className="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button className="btn btn-secondary ml-2"
                                            onClick={(e) => handleShowOption(e, item)}
                                            type="button">
                                            <span
                                                style={{
                                                    lineHeight: 1,
                                                }}
                                                className="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </li>
                            )
                        })}
                    </ul>
                </div>
            </div>
            {add && (
                <div>
                    <div className="modal fade show" id="modalAdd" tabindex="-1" aria-labelledby="modalAdd" style={{
                        display: "block"
                    }} aria-modal="true" role="dialog">
                        <div className="modal-dialog">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <h5 className="modal-title h4" id="exampleModalFullscreenLabel">Thêm kích thước</h5>
                                    <button type="button" className="btn-close" data-bs-dismiss="modal"
                                        onClick={() => setAdd(false)}
                                        aria-label="Close">X</button>
                                </div>
                                <div className="modal-body">
                                    <div className="mb-3">
                                        <label htmlhtmlFor="length" className="form-label">Chiều dài</label>
                                        <input type="number" value={formAdd.length} onChange={(e) => setFormAdd({ ...formAdd, length: e.target.value })} className="form-control" id="length" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlhtmlFor="width" className="form-label">Chiều rộng</label>
                                        <input type="number" className="form-control" value={formAdd.width} onChange={(e) => setFormAdd({ ...formAdd, width: e.target.value })} id="width" />
                                    </div>
                                </div>
                                <div className="modal-footer">
                                    <button type="button" className="btn btn-secondary"
                                        onClick={() => setAdd(false)}
                                        data-bs-dismiss="modal">Đóng</button>

                                    <button
                                        className="btn btn-primary"
                                        type="button"
                                        disabled={
                                            !formAdd.length || !formAdd.width
                                        }
                                        onClick={(e) => saveKichThuocProduct(e)}
                                    >
                                        Lưu kích thước
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="modal-backdrop fade show"></div>
                </div>
            )}
            {modal && detail && (
                <div>
                    <div className="modal fade show" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" style={{
                        display: "block"
                    }} aria-modal="true" role="dialog">
                        <div className="modal-dialog modal-full">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <h5 className="modal-title h4" id="exampleModalFullscreenLabel">{detail.length}mm x {detail.width}mm</h5>
                                    <button type="button" className="btn-close" data-bs-dismiss="modal"
                                        onClick={() => setModal(false)}
                                        aria-label="Close">X</button>
                                </div>
                                <div className="modal-body">
                                    <div className="row">
                                        <div className="col-md-6 mb-3">
                                            <label htmlFor="cl_id" className="form-label">Chất liệu</label>
                                            <select className="form-control" name="cl_id"
                                                id="cl_id"
                                                value={formKT.cl_id}
                                                onChange={(e) => setFormKT({ ...formKT, cl_id: e.target.value })}
                                            >
                                                <option value="">Chọn chất liệu</option>
                                                {configs && configs.chatLieu && configs.chatLieu.map(item => {
                                                    return <option key={item.id} value={item.id}>{item.name}</option>
                                                })}
                                            </select>
                                        </div>
                                        <div className="col-md-6 mb-3">
                                            <label htmlFor="ki_id" className="form-label">Khổ decal in</label>
                                            <select className="form-control" name="ki_id"
                                                id="ki_id"
                                                value={formKT.ki_id}
                                                onChange={(e) => setFormKT({ ...formKT, ki_id: e.target.value })}
                                            >
                                                <option value="">Chọn khổ decal in</option>
                                                {configs && configs.khoIn && configs.khoIn.map(item => {
                                                    return <option key={item.id} value={item.id}>{item.left}x{item.right}</option>
                                                })}
                                            </select>
                                        </div>
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="total_count_decal" className="form-label">Số con khả thi trên 1 khổ decal</label>
                                        <input type="number" className="form-control"
                                            value={formKT.total_count_decal}
                                            onChange={(e) => setFormKT({ ...formKT, total_count_decal: e.target.value })}
                                            id="total_count_decal" name="total_count_decal" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="price_nl_m2" className="form-label">Giá NL + ịn 1m</label>
                                        <input type="number" className="form-control"
                                            value={formKT.price_nl_m2}
                                            onChange={(e) => {
                                                const price_nl_m2 = e.target.value;
                                                const price_nl = Number(price_nl_m2) > 700 ? Number(price_nl_m2) - 700 : 0;
                                                const newForm = { ...formKT, price_nl_m2: price_nl_m2, price_nl: price_nl }
                                                setFormKT(newForm);
                                            }}
                                            id="price_nl_m2" name="price_nl_m2" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="price_nl" className="form-label">Giá ng NL</label>
                                        <input type="number" className="form-control"
                                            value={formKT.price_nl}
                                            onChange={(e) => setFormKT({ ...formKT, price_nl: e.target.value })}
                                            id="price_nl" />
                                    </div>
                                    <div className="row">
                                        <div className="col-md-4 mb-4">
                                            <label className="form-label">Cán màng</label>
                                            <div className="row">
                                                {
                                                    configs && configs.canMang && configs.canMang.map(item => {
                                                        return <div className="col-md-4" key={item.id}>
                                                            <div className="form-check">
                                                                <input className="form-check-input"
                                                                    onChange={(e) => {
                                                                        const isChecked = e.target.checked;
                                                                        setFormKT({
                                                                            ...formKT,
                                                                            idsCanMang: isChecked ? [...formKT.idsCanMang, item.id] : formKT.idsCanMang.filter(id => id !== item.id),
                                                                        })
                                                                    }}
                                                                    type="checkbox" value={item.id} id={`can_mang_${item.id}`} />
                                                                <label className="form-check-label" htmlFor={`can_mang_${item.id}`}>
                                                                    {item.name}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    })
                                                }
                                            </div>
                                        </div>
                                        <div className="col-md-4 mb-4">
                                            <label className="form-label">Quy cách</label>
                                            <div className="row">
                                                {
                                                    configs && configs.quyCach && configs.quyCach.map(item => {
                                                        return <div className="col-md-4" key={item.id}>
                                                            <div className="form-check">
                                                                <input className="form-check-input"
                                                                    onChange={(e) => {
                                                                        const isChecked = e.target.checked;
                                                                        setFormKT({
                                                                            ...formKT,
                                                                            idsQuyCach: isChecked ? [...formKT.idsQuyCach, item.id] : formKT.idsQuyCach.filter(id => id !== item.id),
                                                                        })
                                                                    }}
                                                                    type="checkbox" value={item.id} id={`quy_cach_${item.id}`} />
                                                                <label className="form-check-label" htmlFor={`quy_cach_${item.id}`}>
                                                                    {item.name}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    })
                                                }
                                            </div>
                                        </div>
                                        <div className="col-md-4 mb-4">
                                            <label className="form-label">Mặt in</label>
                                            <div className="row">
                                                {
                                                    configs && configs.matIn && configs.matIn.map(item => {
                                                        return <div className="col-md-4" key={item.id}>
                                                            <div className="form-check">
                                                                <input className="form-check-input"
                                                                    onChange={(e) => {
                                                                        const isChecked = e.target.checked;
                                                                        setFormKT({
                                                                            ...formKT,
                                                                            idsMatIn: isChecked ? [...formKT.idsMatIn, item.id] : formKT.idsMatIn.filter(id => id !== item.id),
                                                                        })
                                                                    }}
                                                                    type="checkbox" value={item.id} id={`mat_in_${item.id}`} />
                                                                <label className="form-check-label" htmlFor={`mat_in_${item.id}`}>
                                                                    {item.name}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    })
                                                }
                                            </div>
                                        </div>
                                        <div className="col-md-4 mb-4">
                                            <label className="form-label">Số lượng</label>
                                            <div className="row">
                                                {
                                                    configs && configs.matIn && configs.matIn.map(item => {
                                                        return <div className="col-md-4" key={item.id}>
                                                            <div className="form-check">
                                                                <input className="form-check-input"
                                                                    onChange={(e) => {
                                                                        const isChecked = e.target.checked;
                                                                        setFormKT({
                                                                            ...formKT,
                                                                            idsSoluong: isChecked ? [...formKT.idsSoluong, item.id] : formKT.idsSoluong.filter(id => id !== item.id),
                                                                        })
                                                                    }}
                                                                    type="checkbox" value={item.id} id={`so_luong_${item.id}`} />
                                                                <label className="form-check-label" htmlFor={`so_luong_${item.id}`}>
                                                                    {item.name}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    })
                                                }
                                            </div>
                                        </div>
                                        <div className="col-md-4 mb-4">
                                            <label className="form-label">Thời gian</label>
                                            <div className="row">
                                                {
                                                    configs && configs.thoiGian && configs.thoiGian.map(item => {
                                                        return <div className="col-md-4" key={item.id}>
                                                            <div className="form-check">
                                                                <input className="form-check-input"
                                                                    onChange={(e) => {
                                                                        const isChecked = e.target.checked;
                                                                        setFormKT({
                                                                            ...formKT,
                                                                            idsThoiGian: isChecked ? [...formKT.idsThoiGian, item.id] : formKT.idsThoiGian.filter(id => id !== item.id),
                                                                        })
                                                                    }}
                                                                    type="checkbox" value={item.id} id={`thoi_gian_${item.id}`} />
                                                                <label className="form-check-label" htmlFor={`thoi_gian_${item.id}`}>
                                                                    {item.name}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    })
                                                }
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="modal-footer">
                                    <button type="button" className="btn btn-secondary"
                                        onClick={() => setModal(false)}
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button
                                        className="btn btn-primary"
                                        type="button"
                                        disabled={
                                            !formKT.cl_id ||
                                            !formKT.kt_id ||
                                            !formKT.ki_id ||
                                            !formKT.total_count_decal ||
                                            !formKT.price_nl_m2 ||
                                            !formKT.price_nl
                                        }
                                        onClick={(e) => saveKichThuocOption(e)}
                                    >
                                        Lưu options
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="modal-backdrop fade show"></div>
                </div >
            )
            }
            <div className={`sidebar-option ${sidebar ? 'show' : ''}`}>
                <div className="d-flex justify-content-between align-items-center sidebar-header">
                    <h3 className="m-0"><b>Danh sách options</b></h3>
                    <button className="btn btn-secondary sidebar-close"
                        onClick={() => setSidebar(false)}
                    >
                        x
                    </button>
                </div>
                <div className="sidebar-body">
                    <ul className="m-0 p-0 list-style-none"
                        style={{
                            listStyle:"none"
                        }}
                    >
                        {allChatLieu && allChatLieu.length > 0 && allChatLieu.map(item => {
                            const khoIn = item.khoIn;
                            const chatLieu = item.chatLieu;
                            const listMatIn = item.matIn;
                            const listThoiGian = item.thoiGian;
                            const listSoLuong = item.soLuong;
                            const listQuyCach = item.quyCach;
                            const listCanMang = item.canMang;
                            return (
                                <li className="item__k" key={item.id}>
                                    <div className="form-group">
                                        <div>Sô con khả thi trên 1 khổ decal: <b>{item.total_count_decal}</b></div>
                                        <div>Giá NL + ịn 1m: <b>{item.price_nl_m2}</b><dup>đ</dup></div>
                                        <div>Giá ng NL: <b>{item.price_nl}</b><dup>đ</dup></div>
                                    </div>
                                    <div className="row">
                                        <fieldset class="col-md-4 mb-2">
                                            <legend class="col-form-label pt-0"><b>Chất Liệu</b></legend>
                                            <div>
                                                <span className="badge bg-danger">{chatLieu.name}</span>
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-md-4 mb-2">
                                            <legend class="col-form-label pt-0"><b>Số mặt in</b></legend>
                                            <div>
                                                {listMatIn && listMatIn.length > 0 && listMatIn.map(item => {
                                                    return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                })}
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-md-4 mb-2">
                                            <legend class="col-form-label pt-0"><b>Loại cán màng</b></legend>
                                            <div>
                                                {listCanMang && listCanMang.length > 0 && listCanMang.map(item => {
                                                    return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                })}
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-md-4 mb-2">
                                            <legend class="col-form-label pt-0"><b>Khổ decal in</b></legend>
                                            <div>
                                                {khoIn.left}x{khoIn.right}
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-md-4 mb-2">
                                            <legend class="col-form-label pt-0"><b>Quy cách</b></legend>
                                            <div>
                                                {listQuyCach && listQuyCach.length > 0 && listQuyCach.map(item => {
                                                    return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                })}
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-md-4 mb-2">
                                            <legend class="col-form-label pt-0"><b>Số lượng</b></legend>
                                            <div>
                                                {listSoLuong && listSoLuong.length > 0 && listSoLuong.map(item => {
                                                    return <span key={item.id} className="badge bg-success mr-2">{item.count}</span>
                                                })}
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-md-4 mb-2">
                                            <legend class="col-form-label pt-0"><b>Thời gian</b></legend>
                                            <div>
                                                {listThoiGian && listThoiGian.length > 0 && listThoiGian.map(item => {
                                                    return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                })}
                                            </div>
                                        </fieldset>
                                    </div>

                                </li>
                            )
                        })}
                    </ul>
                </div>
                <div className="sidebar-overload"></div>
            </div>
        </div >
    )
}
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <StrictMode>
        <OptionsApp />
    </StrictMode>
);