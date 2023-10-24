const { useState, useEffect, StrictMode } = React;
function OptionsApp() {
    const [allKichThuoc, setAllKichThuoc] = useState([]);
    const [configs, setConfigs] = useState({});
    const [add, setAdd] = useState(false);
    const [modal, setModal] = useState(false);
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
    useEffect(() => {
        const getProductKichThuoc = async () => {
            await fetch(`${API}/get-kich-thuoc.php?productID=${PRODUCT_ID}`)
                .then(async (response) => await response.json())
                .then(async (response) => {
                    console.log(response)
                    const { success, alls } = response;
                    setAllKichThuoc(alls);
                })
        }
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
            .then((res) => {
                console.log('>>>saveKichThuocProduct', res);
                const { detail, success, message } = res;
                setAllKichThuoc([...allKichThuoc, detail]);
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
                console.log('>>>saveKichThuocOption', res);
            }).finally(() => {
                setFormKT(formKTDefault);
                setModal(false);
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
                                        <button className="btn btn-secondary"
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-gear" viewBox="0 0 16 16">
                                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
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
                                        // disabled={
                                        //     !formKT.cl_id ||
                                        //     !formKT.kt_id ||
                                        //     !formKT.ki_id ||
                                        //     !formKT.total_count_decal ||
                                        //     !formKT.price_nl_m2 ||
                                        //     !formKT.price_nl
                                        // }
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
        </div >
    )
}
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <StrictMode>
        <OptionsApp />
    </StrictMode>
);