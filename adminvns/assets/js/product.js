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
    const [loading, setLoading] = useState(false);
    const [deleted, setDeleted] = useState(false);
    const [ktDeleted, setKtDeleted] = useState(0);
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
    const handleDeleteOption = async (e, item) => {
        e.preventDefault();
        setLoading(true);
        await fetch(`${API}/delete-option.php`, {
            method: "POST",
            body: JSON.stringify({ ktcl_id: item.id })
        }).then(response => response.json())
            .then((res) => {
                const { success, message } = res;
                if (success) {
                    const newChatLieu = allChatLieu.filter(ls => ls.id !== item.id);
                    setAllChatLieu(newChatLieu);
                }
                showToast(message, success);
            }).finally(() => {
                setTimeout(() => {
                    setLoading(false);
                }, 500);
            });
    }
    const openDeleted = (e, item) => {
        e.preventDefault();
        setDeleted(true);
        setKtDeleted(item.id);
    }
    const deleteKichThuoc = async (e) => {
        e.preventDefault();
        setLoading(true);
        await fetch(`${API}/delete-kich-thuoc.php`, {
            method: "POST",
            body: JSON.stringify({ ktDeleted })
        }).then(response => response.json())
            .then((res) => {
                const { success, message } = res;
                if (success) {
                    const newAllKichThuoc = allKichThuoc.filter(ls => ls.id !== ktDeleted);
                    setAllKichThuoc(newAllKichThuoc);
                }
                showToast(message, success);
            }).finally(() => {
                setTimeout(() => {
                    setLoading(false);
                    setDeleted(false);
                }, 300);
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
                        <li className="d-flex justify-content-between align-items-center mb-3 border-bottom pb-1 pt-1">
                            <div className="box-info d-flex align-items-center">
                                <div className="box-info-id mr-2">
                                    <span><b>ID</b></span>
                                </div>
                                <div className="box-info-length-width mr-2">
                                    <span><b>Kích thước</b></span>
                                </div>
                                <div className="box-info-length-width">
                                    <span><b>Tổng options</b></span>
                                </div>
                            </div>
                            <div className="box-action">
                                <span><b>Thao tác</b></span>
                            </div>
                        </li>
                        {allKichThuoc && allKichThuoc.length > 0 && allKichThuoc.map(item => {
                            return (
                                <li className="d-flex justify-content-between align-items-center mb-3 border-bottom pb-1 pt-1" key={item.id}>
                                    <div className="box-info d-flex align-items-center">
                                        <div className="box-info-id mr-2">
                                            <span><b>{item.id}</b></span>
                                        </div>
                                        <div className="box-info-length-width mr-2">
                                            <span>{item.length}mm x {item.width}mm <span className="text-red">({item.total_items})</span></span>
                                        </div>
                                        <div className="box-info-length-width">
                                            <span className={`badge bg-${item.status ? 'success' : 'secondary'}`}>{item.status ? 'Sử dụng' : 'Không sử dụng'}</span>
                                        </div>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button className="btn btn-secondary ml-2 mr-2"
                                            onClick={(e) => handleShowOption(e, item)}
                                            type="button">
                                            <span
                                                style={{
                                                    lineHeight: 1,
                                                }}
                                                className="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button className="btn btn-danger"
                                            type="button"
                                            onClick={(e) => openDeleted(e, item)}
                                        >
                                            <span
                                                style={{
                                                    lineHeight: 1,
                                                }}
                                                className="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
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
            {deleted &&
                <div>
                    <div className="modal fade show" id="exampleModal" tabindex="-1" style={{
                        display: "block"
                    }} >
                        <div className="modal-dialog">
                            <div className="modal-content">
                                <div className="modal-body">
                                    <h5 className="m-0 h5">Bạn chắc chắn muốn xóa chứ?</h5>
                                </div>
                                <div className="modal-footer">
                                    <button type="button" className="btn btn-secondary" data-bs-dismiss="modal"
                                        onClick={(e) => setDeleted(false)}
                                    >Hủy bỏ</button>
                                    <button type="button" className="btn btn-primary"
                                        onClick={(e) => deleteKichThuoc(e)}
                                    >Đồng ý</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="modal-backdrop fade show"></div>
                </div>
            }
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
                            listStyle: "none"
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
                                        <div>Giá NL + ịn 1m: <b>{Intl.NumberFormat('vi-VN').format(item.price_nl_m2)}</b><sup>đ</sup></div>
                                        <div>Giá ng NL: <b>{Intl.NumberFormat('vi-VN').format(item.price_nl)}</b><sup>đ</sup></div>
                                    </div>
                                    <div className="row">
                                        <fieldset className="col-md-4 mb-2">
                                            <legend className="col-form-label pt-0"><b>Chất Liệu</b></legend>
                                            <div>
                                                <span className="badge bg-danger">{chatLieu.name}</span>
                                            </div>
                                        </fieldset>
                                        <fieldset className="col-md-4 mb-2">
                                            <legend className="col-form-label pt-0"><b>Khổ decal in</b></legend>
                                            <div>
                                                {khoIn.left}x{khoIn.right}
                                            </div>
                                        </fieldset>
                                        {
                                            listMatIn && listMatIn.length > 0 &&
                                            <fieldset className="col-md-4 mb-2">
                                                <legend className="col-form-label pt-0"><b>Số mặt in</b></legend>
                                                <div>
                                                    {listMatIn.map(item => {
                                                        return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                    })}
                                                </div>
                                            </fieldset>
                                        }
                                        {
                                            listCanMang && listCanMang.length > 0 &&
                                            <fieldset className="col-md-4 mb-2">
                                                <legend className="col-form-label pt-0"><b>Loại cán màng</b></legend>
                                                <div>
                                                    {listCanMang.map(item => {
                                                        return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                    })}
                                                </div>
                                            </fieldset>
                                        }

                                        {
                                            listQuyCach && listQuyCach.length > 0 &&
                                            <fieldset className="col-md-4 mb-2">
                                                <legend className="col-form-label pt-0"><b>Quy cách</b></legend>
                                                <div>
                                                    {listQuyCach.map(item => {
                                                        return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                    })}
                                                </div>
                                            </fieldset>
                                        }
                                        {
                                            listSoLuong && listSoLuong.length > 0 &&
                                            <fieldset className="col-md-4 mb-2">
                                                <legend className="col-form-label pt-0"><b>Số lượng</b></legend>
                                                <div>
                                                    {listSoLuong.map(item => {
                                                        return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                    })}
                                                </div>
                                            </fieldset>
                                        }
                                        {
                                            listThoiGian && listThoiGian.length > 0 &&
                                            <fieldset className="col-md-4 mb-2">
                                                <legend className="col-form-label pt-0"><b>Thời gian</b></legend>
                                                <div>
                                                    {listThoiGian.map(item => {
                                                        return <span key={item.id} className="badge bg-success mr-2">{item.name}</span>
                                                    })}
                                                </div>
                                            </fieldset>
                                        }
                                    </div>
                                    <div className="mt-3 d-flex justify-content-end align-items-center mb-3">
                                        <button
                                            className="btn btn-danger"
                                            type="button"
                                            onClick={(e) => handleDeleteOption(e, item)}
                                        > Xóa</button>
                                    </div>
                                </li>
                            )
                        })}
                    </ul>
                    {
                        loading && <div className="mainLoading">
                            <div className="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        </div>
                    }
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