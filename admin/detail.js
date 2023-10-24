const API = 'http://127.0.0.1:8000/api';
const { useState, useEffect, StrictMode } = React;
function App() {
    const [product, setProduct] = useState({
        id: 1,
        name: "Iphone 15 ProMax 2015",
        price: 15000,
        handle: 'iphone-15-pro-max-215'
    });
    const [allKichThuoc, setAllKichThuoc] = useState([]);
    const [kichThuocActive, setKichThuocActive] = useState({});
    const [chatLieuActive, setChatLieuActive] = useState({});
    const [price, setPrice] = useState(0);
    const [dataActive, setDataActive] = useState({
        kich_thuoc: null,
        mat_in: null,
        can_mang: null,
        quy_cach: null,
        so_luong: null,
        thoi_gian: null
    })
    useEffect(() => {
        const getProductDetail = async () => {
            await fetch(`${API}/product/detail`, {
                method: "GET"
            })
                .then(response => response.json())
                .then(async (res) => {
                    await setAllKichThuoc(res.kichThuoc);
                    await setKichThuocActive(res.kichThuoc[0]);
                    const clActive = await res.kichThuoc[0].kich_thuoc_chat_lieu[0];
                    await setChatLieuActive(clActive);
                    const activeD = {
                        kich_thuoc: res.kichThuoc[0],
                        mat_in: clActive.mat_in ? clActive.mat_in[0] : null,
                        can_mang: clActive.can_mang ? clActive.can_mang[0] : null,
                        thoi_gian: clActive.thoi_gian ? clActive.thoi_gian[0] : null,
                        so_luong: clActive.so_luong ? clActive.so_luong[0] : null,
                        quy_cach: clActive.quy_cach ? clActive.quy_cach[0] : null,
                    };
                    await setDataActive(activeD);
                    await calculatorPrice(clActive, activeD);
                })
        }
        getProductDetail();
    }, [])
    const calculatorPrice = async (clActive, activeD) => {
        await fetch(`${API}/product/calculator`, {
            method: "POST",
            body: JSON.stringify({ clActive: clActive, dataActive: activeD })
        })
            .then(response => response.json())
            .then(async (res) => {
                console.log(">>>calculatorPrice", res);
                setPrice(res.price);
            })
    }
    const handleKichThuoc = (e) => {
        e.preventDefault();
        const itemActive = allKichThuoc.find((item) => Number(item.id) === Number(e.target.value));
        setKichThuocActive(itemActive);
        setChatLieuActive(itemActive.kich_thuoc_chat_lieu[0]);
    }
    const handleDataActive = async (e, type) => {
        const value = e.target.value
        if (type == 'mat_in') {
            let itemMatIn = chatLieuActive.mat_in.find(item => item.id == value);
            setDataActive({ ...dataActive, mat_in: itemMatIn });
        }
        if (type == 'can_mang') {
            let itemCanMang = chatLieuActive.can_mang.find(item => item.id == value);
            setDataActive({ ...dataActive, can_mang: itemCanMang });
        }
        if (type == 'thoi_gian') {
            let itemThoiGian = chatLieuActive.thoi_gian.find(item => item.id == value);
            setDataActive({ ...dataActive, thoi_gian: itemThoiGian });
        }
        if (type == 'so_luong') {
            let itemSoLuong = chatLieuActive.so_luong.find(item => item.id == value);
            setDataActive({ ...dataActive, so_luong: itemSoLuong });
        }
        if (type == 'quy_cach') {
            let itemQuyCach = chatLieuActive.quy_cach.find(item => item.id == value);
            setDataActive({ ...dataActive, quy_cach: itemQuyCach });
        }
        await calculatorPrice(kichThuocActive, dataActive);
    }
    return (
        <div>
            <h1>Product detail: {product.name}</h1>
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
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Chi tiết đặt hàng</legend>
                <div>
                    <label htmlFor="kich_thuoc">Kích thước</label>
                    <select class="form-select"
                        onChange={(e) => handleKichThuoc(e)}
                        value={kichThuocActive ? kichThuocActive.id : ""}
                    >
                        <option value="">Chọn kích thước</option>
                        {allKichThuoc.map(item => {
                            return <option key={item.id} value={item.id}>{item.length} mm x {item.width} mm </option>
                        })}
                    </select>
                </div>
                {kichThuocActive && kichThuocActive.length > 0 &&
                    <div>
                        <div>
                            <label htmlFor="kich_thuoc">Chất Liệu</label>
                            <select class="form-select"
                                value={chatLieuActive ? chatLieuActive.id : ""}
                            >
                                <option value="">Chọn chất liệu</option>
                                {kichThuocActive.kich_thuoc_chat_lieu.map(item => {
                                    return <option key={item.id} value={item.id}>{item.chat_lieu.name}</option>
                                })}
                            </select>
                        </div>
                        {
                            chatLieuActive.mat_in && chatLieuActive.mat_in.length > 0 &&
                            <div>
                                <label htmlFor="kich_thuoc">Số mặt in</label>
                                <select class="form-select"
                                    value={dataActive.mat_in ? dataActive.mat_in.id : ""}
                                    onChange={(e) => handleDataActive(e, 'mat_in')}
                                >
                                    <option value="">Chọn mặt in</option>
                                    {chatLieuActive.mat_in.map(item => {
                                        return <option key={item.id} value={item.id}>{item.name}</option>
                                    })}
                                </select>
                            </div>
                        }
                        {
                            chatLieuActive.can_mang && chatLieuActive.can_mang.length > 0 &&
                            <div>
                                <label htmlFor="kich_thuoc">Loại cán màng</label>
                                <select class="form-select"
                                    value={dataActive.can_mang ? dataActive.can_mang.id : ""}
                                    onChange={(e) => handleDataActive(e, 'can_mang')}
                                >
                                    <option value="">Chọn loại cán màng</option>
                                    {chatLieuActive.can_mang.map(item => {
                                        return <option key={item.id} value={item.id}>{item.name}</option>
                                    })}
                                </select>
                            </div>
                        }

                        {
                            chatLieuActive.quy_cach && chatLieuActive.quy_cach.length > 0 &&
                            <div>
                                <label htmlFor="kich_thuoc">Quy cách</label>
                                <select class="form-select"
                                    value={dataActive.quy_cach ? dataActive.quy_cach.id : ""}
                                    onChange={(e) => handleDataActive(e, 'quy_cach')}
                                >
                                    <option value="">Chọn quy cách</option>
                                    {chatLieuActive.quy_cach.map(item => {
                                        return <option key={item.id} value={item.id}>{item.name}</option>
                                    })}
                                </select>
                            </div>
                        }
                        {
                            chatLieuActive.so_luong && chatLieuActive.so_luong.length > 0 &&
                            <div>
                                <label htmlFor="kich_thuoc">Số lượng</label>
                                <select class="form-select"
                                    value={dataActive.so_luong ? dataActive.so_luong.id : ""}
                                    onChange={(e) => handleDataActive(e, 'so_luong')}
                                >
                                    <option value="">Chọn số lượng</option>
                                    {chatLieuActive.so_luong.map(item => {
                                        return <option key={item.id} value={item.id}>{item.count}</option>
                                    })}
                                </select>
                            </div>
                        }
                        {chatLieuActive.thoi_gian && chatLieuActive.thoi_gian.length > 0 &&
                            <div>
                                <label htmlFor="kich_thuoc">Thời gian</label>
                                <select class="form-select"
                                    value={dataActive.thoi_gian ? dataActive.thoi_gian.id : ""}
                                    onChange={(e) => handleDataActive(e, 'thoi_gian')}
                                >
                                    <option value="">Chọn thời gian</option>
                                    {chatLieuActive.thoi_gian.map(item => {
                                        return <option key={item.id} value={item.id}>{item.name}</option>
                                    })}
                                </select>
                            </div>
                        }
                    </div>
                }
            </fieldset>
            <div>
                <div>Thành tiền: <b><span className="payment">{price}</span>đ</b></div>
            </div>
        </div>
    );
}
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <StrictMode>
        <App />
    </StrictMode>
);