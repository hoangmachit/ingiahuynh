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
    const [width, setWidth] = useState(100);
    const [length, setLength] = useState(100);
    const [kichThuoc, setKichThuoc] = useState([]);
    const [loading, setLoading] = useState(false);
    const [isModal, setIsModal] = useState(false);
    const [chatLieuForm, setChatLieuForm] = useState({
        so_luong_so_con_tren_1_decal: 0,
        gia_nl_m2: 0,
        gia_nl: 0,
        p_kich_thuoc_id: 0,
        p_chat_lieu_id: 0,
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
            <h1>Admin Product: {product.name}</h1>
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
                    className="btnAddSize"
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
                                    <p>Kích thước Dài: {item.length}mm Rộng: {item.width}mm</p>
                                </div>
                                <div>
                                    <p>Khổ in:</p>
                                    <div>
                                        <button
                                            onClick={(e) => openModalKichThuoc(e, item.id)}
                                        >Tạo Kích thước chất liệu</button>
                                    </div>
                                    <br />
                                    <br />
                                    <ul>
                                        {kichThuocChatLieu && kichThuocChatLieu.length > 0 && kichThuocChatLieu.map((itemK, keyK) => {
                                            return (
                                                <li className="item__k" key={keyK}>
                                                    <div className="form-group">
                                                        <div>Số lượng con con trên 1 decal:</div>
                                                        <input type="text" className="form-control" defaultValue={itemK.so_luong_so_con_tren_1_decal} />
                                                    </div>
                                                    <div className="form-group">
                                                        <div>Giá NL trên 1 m2:</div>
                                                        <input type="text" className="form-control" defaultValue={itemK.gia_nl_m2} />
                                                    </div>
                                                    <div className="form-group">
                                                        <div>Giá NL:</div>
                                                        <input type="text" className="form-control" defaultValue={itemK.gia_nl} />
                                                    </div>
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
                        <div className="modal-dialog">
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
                                        <div className="col-md-6">
                                            <div className="mb-0">
                                                <label htmlFor="p_chat_lieu_id" className="col-form-label">p_chat_lieu_id:</label>
                                                <select name="p_chat_lieu_id" id="p_chat_lieu_id" onChange={(e) => setChatLieuForm({ ...chatLieuForm, p_chat_lieu_id: e.target.value })} class="form-control" value={chatLieuForm.p_chat_lieu_id}>
                                                    <option value="">Choice Chat Lieu ID</option>
                                                    {configs.chatLieu.map(item => {
                                                        return <option value={item.id} key={item.id}>{item.name}</option>
                                                    })}
                                                </select>
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
                    <div class="modal-backdrop fade show"></div>
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