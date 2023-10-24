const API = 'http://127.0.0.1:8000/api';
const { useState, useEffect, StrictMode } = React;
function App() {
    const [product, setProduct] = useState({
        id: 1,
        name: "Iphone 15 ProMax 2015",
        price: 15000,
        handle: 'iphone-15-pro-max-215'
    });
    const [configs, setConfigs] = useState([]);
    useEffect(() => {
        const fetchData = async () => {
            await fetch('http://127.0.0.1:8000/api/configs')
                .then((response) => response.json())
                .then((res) => {
                    console.log('>>>>res', res);
                    setConfigs(res.configs);
                    setKichThuoc(res.kichThuoc);
                });
        }
        fetchData();
    }, []);
    const [width, setWidth] = useState(0);
    const [length, setLength] = useState(0);
    const [kichThuoc, setKichThuoc] = useState([]);
    const [loading, setLoading] = useState(false);
    const [isModal, setIsModal] = useState(false);
    const [chatLieuForm, setChatLieuForm] = useState({
        so_luong_so_con_tren_1_decal: 0,
        gia_nl_m2: 0,
        gia_nl: 0,
        p_kich_thuoc_id: 0,
        p_chat_lieu_id: 0,
        p_kho_in_id: 0,
        p_kich_thuoc_can_mang: [],
        p_kich_thuoc_mat_in: [],
        p_kich_thuoc_quy_cach: [],
        p_kich_thuoc_so_luong: [],
        p_kich_thuoc_thoi_gian: [],
    });
    const handleKichThuoc = async (e) => {
        e.preventDefault();
        setLoading(true);
        const formData = new FormData();
        formData.append('product_id', 1);
        formData.append('length', length);
        formData.append('width', width);
        await fetch(`${API}/kich-thuoc/create`, {
            method: "post",
            body: formData,
        })
            .then((response) => response.json())
            .then((res) => {
                const { alls } = res;
                setKichThuoc(alls);
                setWidth(0);
                setLength(0);
            });
    }
    const openModalKichThuoc = async (e, p_kich_thuoc_chat_lieu_id) => {
        e.preventDefault();
        setChatLieuForm({ ...chatLieuForm, p_kich_thuoc_id: p_kich_thuoc_chat_lieu_id });
        setIsModal(true);
    }
    const savePChatLieuKichThuoc = async (e) => {
        e.preventDefault();
        await fetch(`${API}/kich-thuoc/chat-lieu/create`, {
            method: "POST",
            body: JSON.stringify(chatLieuForm),
        })
            .then(response => response.json())
            .then((res) => {
                console.log(">>>>> res", res);
            })
    }
    return (
        <div>
            <h1>Admin Product: <a target="blank" href="detail.html">{product.name}</a></h1>
            <ul>
                <li>
                    Id: {product.id}
                </li>
                <li>
                    Price: {product.price}
                </li>
                <li>
                    Handle: {product.handle}
                </li>
            </ul>
            <hr />
            <div className="boxSize">
                <form action="">
                    <div>
                        <label htmlFor="length">Chiều dài</label> <br />
                        <input type="number" id="length" value={length} onChange={(e) => setLength(e.target.value)} />
                    </div>
                    <div>
                        <label htmlFor="width">Chiều rộng</label> <br />
                        <input type="number" id="width" value={width} onChange={(e) => setWidth(e.target.value)} />
                    </div>
                </form>
                <button
                    className="btn btn-primary btnAddSize"
                    disabled={!width || !length}
                    onClick={handleKichThuoc}
                >Thêm kích thước</button>
                <br />
                <ul>
                    {kichThuoc && kichThuoc.length > 0 && kichThuoc.map((item, key) => {
                        const kichThuocChatLieu = item.kich_thuoc_chat_lieu;
                        return (
                            <li className="item_size" key={key}>
                                <div>
                                    <p>Kích thước Dài: <b>{item.length}mm X {item.width}mm</b></p>
                                </div>
                                <div>
                                    <p>Thông tin của các kích thước:</p>
                                    <div>
                                        <button
                                            className="btn btn-secondary"
                                            onClick={(e) => openModalKichThuoc(e, item.id)}
                                        >Tạo Kích thước chất liệu</button>
                                    </div>
                                    <br />
                                    <br />
                                    <ul>
                                        {kichThuocChatLieu && kichThuocChatLieu.length > 0 && kichThuocChatLieu.map((itemK, keyK) => {
                                            const listSoLuong = itemK.so_luong;
                                            const listCanMang = itemK.can_mang;
                                            const listMatIn = itemK.mat_in;
                                            const listQuyCach = itemK.quy_cach;
                                            const listThoiGian = itemK.thoi_gian;
                                            const chatLieu = itemK.chat_lieu;
                                            return (
                                                <li className="item__k" key={keyK}>
                                                    <div className="form-group">
                                                        <div>sô con khả thi trên 1 khổ decal:</div>
                                                        <input type="text" className="form-control" defaultValue={itemK.so_luong_so_con_tren_1_decal} />
                                                    </div>
                                                    <div className="form-group">
                                                        <div>giá NL + ịn 1m:</div>
                                                        <input type="text" className="form-control" defaultValue={itemK.gia_nl_m2} />
                                                    </div>
                                                    <div className="form-group">
                                                        <div>giá ng NL:</div>
                                                        <input type="text" className="form-control" defaultValue={itemK.gia_nl} />
                                                    </div>
                                                    <hr />
                                                    <fieldset class="row mb-3">
                                                        <legend class="col-form-label col-sm-2 pt-0">TRƯỜNG chất Liệu</legend>
                                                        <div>
                                                            <span className="badge bg-danger">{chatLieu.name}</span>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="row mb-3">
                                                        <legend class="col-form-label col-sm-2 pt-0">TRƯỜNG số mặt in</legend>
                                                        <div>
                                                            {listMatIn && listMatIn.length > 0 && listMatIn.map(item => {
                                                                return <span key={item.id} className="badge bg-success me-2">{item.name}</span>
                                                            })}
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="row mb-3">
                                                        <legend class="col-form-label col-sm-2 pt-0">TRƯỜNG loại cán màng </legend>
                                                        <div>
                                                            {listCanMang && listCanMang.length > 0 && listCanMang.map(item => {
                                                                return <span key={item.id} className="badge bg-success me-2">{item.name}</span>
                                                            })}
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="row mb-3">
                                                        <legend class="col-form-label col-sm-2 pt-0">TRƯỜNG qui cách</legend>
                                                        <div>
                                                            {listQuyCach && listQuyCach.length > 0 && listQuyCach.map(item => {
                                                                return <span key={item.id} className="badge bg-success me-2">{item.name}</span>
                                                            })}
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="row mb-3">
                                                        <legend class="col-form-label col-sm-2 pt-0">khổ decal in</legend>
                                                        <div>
                                                            {itemK.kho_in.left}x{itemK.kho_in.right}
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="row mb-3">
                                                        <legend class="col-form-label col-sm-2 pt-0">TRƯỜNG số lượng</legend>
                                                        <div>
                                                            {listSoLuong && listSoLuong.length > 0 && listSoLuong.map(item => {
                                                                return <span key={item.id} className="badge bg-success me-2">{item.count}</span>
                                                            })}
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="row mb-3">
                                                        <legend class="col-form-label col-sm-2 pt-0">TRƯỜNG thời gian</legend>
                                                        <div>
                                                            {listThoiGian && listThoiGian.length > 0 && listThoiGian.map(item => {
                                                                return <span key={item.id} className="badge bg-success me-2">{item.name}</span>
                                                            })}
                                                        </div>
                                                    </fieldset>
                                                </li>
                                            )
                                        })}
                                    </ul>
                                </div>
                            </li>
                        )
                    })}
                </ul>
            </div>
            {isModal &&
                <div>
                    <div className="modal fade show" style={{ display: "block" }} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div className="modal-dialog modal-xl">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <h1 className="modal-title fs-5" id="exampleModalLabel">New message</h1>
                                    <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        onClick={() => setIsModal(false)}
                                    ></button>
                                </div>
                                <div className="modal-body">
                                    <form>
                                        <div className="mb-3">
                                            <label htmlFor="so_luong_so_con_tren_1_decal" className="col-form-label">so_luong_so_con_tren_1_decal:</label>
                                            <input type="number" className="form-control" value={chatLieuForm.so_luong_so_con_tren_1_decal} onChange={(e) => setChatLieuForm({ ...chatLieuForm, so_luong_so_con_tren_1_decal: e.target.value })} id="so_luong_so_con_tren_1_decal" />
                                        </div>
                                        <div className="row mb-3">
                                            <div className="col-md-6">
                                                <div className="mb-0">
                                                    <label htmlFor="p_chat_lieu_id" className="col-form-label">p_chat_lieu_id:</label>
                                                    <select name="p_chat_lieu_id" id="p_chat_lieu_id" onChange={(e) => setChatLieuForm({ ...chatLieuForm, p_chat_lieu_id: e.target.value })} className="form-control" value={chatLieuForm.p_chat_lieu_id}>
                                                        <option value="">Choice Chat Lieu ID</option>
                                                        {configs.chatLieu.map(item => {
                                                            return <option value={item.id} key={item.id}>{item.name}</option>
                                                        })}
                                                    </select>
                                                </div>
                                            </div>
                                            <div className="col-md-6 mb-3">
                                                <div className="mb-0">
                                                    <label htmlFor="p_kho_in_id" className="col-form-label">Khổ in:</label>
                                                    <select name="p_kho_in_id" id="p_kho_in_id" class="form-control"
                                                        onChange={(e) => setChatLieuForm({ ...chatLieuForm, p_kho_in_id: e.target.value })} className="form-control" value={chatLieuForm.p_kho_in_id}
                                                    >
                                                        <option value="">Choice khổ in</option>
                                                        {configs.khoIn.map(item => {
                                                            return <option value={item.id} key={item.id}>{item.left} x {item.right}</option>
                                                        })}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row mb-3">
                                            <div className="col-md-6">
                                                <div className="mb-0">
                                                    <label htmlFor="gia_nl_m2" className="col-form-label">gia_nl_m2:</label>
                                                    <input text="number" className="form-control" value={chatLieuForm.gia_nl_m2} onChange={(e) => setChatLieuForm({ ...chatLieuForm, gia_nl_m2: e.target.value })} id="gia_nl_m2" />
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="mb-0">
                                                    <label htmlFor="gia_nl" className="col-form-label">gia_nl:</label>
                                                    <input text="number" className="form-control" value={chatLieuForm.gia_nl} id="gia_nl" onChange={(e) => setChatLieuForm({ ...chatLieuForm, gia_nl: e.target.value })} />
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row mb-3">
                                            <div className="col-md-6 mb-3">
                                                <div>Cán màng</div>
                                                {configs.camNang.map(item => {
                                                    return (
                                                        <div className="form-check" key={item.id}>
                                                            <input className="form-check-input"
                                                                onChange={(e) => {
                                                                    const isChecked = e.target.checked;
                                                                    setChatLieuForm({
                                                                        ...chatLieuForm,
                                                                        p_kich_thuoc_can_mang: isChecked ? [...chatLieuForm.p_kich_thuoc_can_mang, item.id] : chatLieuForm.p_kich_thuoc_can_mang.filter(id => id !== item.id),
                                                                    })
                                                                }}
                                                                type="checkbox" value={item.id} id={`can_mang_${item.id}`} />
                                                            <label className="form-check-label" for={`can_mang_${item.id}`}>
                                                                {item.name}
                                                            </label>
                                                        </div>
                                                    )
                                                })}
                                            </div>
                                            <div className="col-md-6 mb-3">
                                                <div>Mặt in</div>
                                                {configs.matIn.map(item => {
                                                    return (
                                                        <div className="form-check" key={item.id}>
                                                            <input className="form-check-input" type="checkbox"
                                                                onChange={(e) => {
                                                                    const isChecked = e.target.checked;
                                                                    setChatLieuForm({
                                                                        ...chatLieuForm,
                                                                        p_kich_thuoc_mat_in: isChecked ? [...chatLieuForm.p_kich_thuoc_mat_in, item.id] : chatLieuForm.p_kich_thuoc_mat_in.filter(id => id !== item.id),
                                                                    })
                                                                }}

                                                                value={item.id} id={`mat_in_${item.id}`} />
                                                            <label className="form-check-label" for={`mat_in_${item.id}`}>
                                                                {item.name}
                                                            </label>
                                                        </div>
                                                    )
                                                })}
                                            </div>
                                            <div className="col-md-6 mb-3">
                                                <div>Quy Cách</div>
                                                {configs.quyCach.map(item => {
                                                    return (
                                                        <div className="form-check" key={item.id}>
                                                            <input className="form-check-input" type="checkbox"
                                                                onChange={(e) => {
                                                                    const isChecked = e.target.checked;
                                                                    setChatLieuForm({
                                                                        ...chatLieuForm,
                                                                        p_kich_thuoc_quy_cach: isChecked ? [...chatLieuForm.p_kich_thuoc_quy_cach, item.id] : chatLieuForm.p_kich_thuoc_quy_cach.filter(id => id !== item.id),
                                                                    })
                                                                }}
                                                                value={item.id} id={`quy_cach_${item.id}`} />
                                                            <label className="form-check-label" for={`quy_cach_${item.id}`}>
                                                                {item.name}
                                                            </label>
                                                        </div>
                                                    )
                                                })}
                                            </div>
                                            <div className="col-md-12 mb-3">
                                                <div>Số Lượng</div>
                                                {configs.soLuong.map(item => {
                                                    return (
                                                        <div className="form-check me-2" key={item.id} style={{ display: "inline-block" }}>
                                                            <input className="form-check-input" type="checkbox"
                                                                onChange={(e) => {
                                                                    const isChecked = e.target.checked;
                                                                    setChatLieuForm({
                                                                        ...chatLieuForm,
                                                                        p_kich_thuoc_so_luong: isChecked ? [...chatLieuForm.p_kich_thuoc_so_luong, item.id] : chatLieuForm.p_kich_thuoc_so_luong.filter(id => id !== item.id),
                                                                    })
                                                                }}
                                                                value={item.id} id={`so_luong_${item.id}`} />
                                                            <label className="form-check-label" for={`so_luong_${item.id}`}>
                                                                {item.count}
                                                            </label>
                                                        </div>
                                                    )
                                                })}
                                            </div>
                                            <div className="col-md-12 mb-3">
                                                <div>Thời gian</div>
                                                {configs.thoiGian.map(item => {
                                                    return (
                                                        <div className="form-check me-2" key={item.id} style={{ display: "inline-block" }}>
                                                            <input className="form-check-input" type="checkbox"
                                                                onChange={(e) => {
                                                                    const isChecked = e.target.checked;
                                                                    setChatLieuForm({
                                                                        ...chatLieuForm,
                                                                        p_kich_thuoc_thoi_gian: isChecked ? [...chatLieuForm.p_kich_thuoc_thoi_gian, item.id] : chatLieuForm.p_kich_thuoc_thoi_gian.filter(id => id !== item.id),
                                                                    })
                                                                }}
                                                                value={item.id} id={`thoi_gian_${item.id}`} />
                                                            <label className="form-check-label" for={`thoi_gian_${item.id}`}>
                                                                {item.name}
                                                            </label>
                                                        </div>
                                                    )
                                                })}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div className="modal-footer">
                                    <button type="button" className="btn btn-secondary"
                                        onClick={() => setIsModal(false)}
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" className="btn btn-primary"
                                        disabled={
                                            !chatLieuForm.so_luong_so_con_tren_1_decal
                                            || !chatLieuForm.gia_nl_m2
                                            || !chatLieuForm.gia_nl
                                            || !chatLieuForm.p_chat_lieu_id
                                        }
                                        onClick={savePChatLieuKichThuoc}
                                    >Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="modal-backdrop fade show"></div>
                </div>
            }
        </div>
    );
}
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <StrictMode>
        <App />
    </StrictMode>
);