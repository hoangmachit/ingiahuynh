const { useState, useEffect, StrictMode } = React;
function SettingApp() {
    const [allChatLieu, setAllChatLieu] = useState([]);
    const [allKhoIn, setAllKhoIn] = useState([]);
    const [allMatIn, setAllMatIn] = useState([]);
    const [allQuyCach, setAllQuyCach] = useState([]);
    const [allSoLuong, setAllSoLuong] = useState([]);
    const [allThoiGian, setAllThoiGian] = useState([]);
    useEffect(() => {
        const getAllData = async () => {
            await fetch(`${API}/setting-option.php`, {
                method: "GET",
            })
                .then(response => response.json())
                .then((res) => {
                    const { result } = res;
                    setAllChatLieu(result.allChatLieu);
                    setAllKhoIn(result.allKhoIn);
                    setAllMatIn(result.allMatIn);
                    setAllQuyCach(result.allQuyCach);
                    setAllSoLuong(result.allSoLuong);
                    setAllThoiGian(result.allThoiGian);
                })
        }
        getAllData();
    }, []);
    const [formChatLieu, setFormChatLieu] = useState({
        id: 0,
        name: ""
    });
    const [formKhoIn, setFormKhoIn] = useState({
        id: 0,
        left: 0,
        right: 0
    });
    const [formMatIn, setFormMatIn] = useState({
        id: 0,
        name: "",
        percent: 1300
    });
    const [formQuyCach, setFormQuyCach] = useState({
        id: 0,
        name: "",
        point: 1000
    });
    const [formSoLuong, setFormSoLuong] = useState({
        id: 0,
        name: "",
        count: 50
    });
    const [formThoiGian, setFormThoiGian] = useState({
        id: 0,
        name: "",
        percent: 100
    });
    const [showForm, setShowForm] = useState({
        chat_lieu: false,
        kho_in: false,
        mat_in: false,
        quy_cach: false,
        so_luong: false,
        thoi_gian: false,
    });
    return (
        <div>
            <div className="row">
                <div className="col-md-6 mb-4">
                    <div className="card card-primary card-outline text-sm mb-0">
                        <div className="card-header d-flex align-items-center">
                            <h3 className="card-title m-0">Danh sách chất liệu</h3>
                            <button className="btn btn-primary ml-2"
                                onClick={(e) => setShowForm({ ...showForm, chat_lieu: true })}
                            >Thêm</button>
                        </div>
                        <div className="card-body pb-3 pt-3">
                            {
                                showForm.chat_lieu &&
                                <form>
                                    <div className="mb-3">
                                        <label htmlFor="chat_lieu_name" className="form-label">Tên chất liệu</label>
                                        <input type="text"
                                            value={formChatLieu.name}
                                            onChange={(e) => setFormChatLieu({ ...formChatLieu, name: e.target.value })}
                                            className="form-control" id="chat_lieu_name" />
                                    </div>
                                    <button type="submit"
                                        disabled={!formChatLieu.name}
                                        className="btn btn-success">Lưu chất liệu</button>
                                </form>
                            }
                            {allChatLieu && allChatLieu.length > 0 && allChatLieu.map(item => {
                                return <li key={item.id} className="d-flex justify-content-between align-items-center border-bottom pb-2 pt-2">
                                    <div className="box-info">
                                        <span>{item.name}</span>
                                    </div>
                                    <div className="box-action">
                                        <button className="btn btn-secondary mr-2">Edit</button>
                                        <button className="btn btn-danger">Xóa</button>
                                    </div>
                                </li>
                            })}
                        </div>
                    </div>
                </div>
                <div className="col-md-6 mb-4">
                    <div className="card card-primary card-outline text-sm mb-0">
                        <div className="card-header d-flex align-items-center">
                            <h3 className="card-title m-0">Danh sách khổ in</h3>
                            <button className="btn btn-primary ml-2"
                                onClick={(e) => setShowForm({ ...showForm, kho_in: true })}
                            >Thêm</button>
                        </div>
                        <div className="card-body pb-3 pt-3">
                            {
                                showForm.kho_in &&
                                <form>
                                    <div className="mb-3">
                                        <label htmlFor="kho_in_left" className="form-label">Left</label>
                                        <input type="number"
                                            value={formKhoIn.left}
                                            onChange={(e) => setFormKhoIn({ ...formKhoIn, left: e.target.value })}
                                            className="form-control" id="kho_in_left" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="kho_in_right" className="form-label">Right</label>
                                        <input type="number"
                                            value={formKhoIn.right}
                                            onChange={(e) => setFormKhoIn({ ...formKhoIn, right: e.target.value })}
                                            className="form-control" id="kho_in_right" />
                                    </div>
                                    <button type="submit"
                                        disabled={!formKhoIn.left || !formKhoIn.right}
                                        className="btn btn-success">Lưu khổ in</button>
                                </form>
                            }
                            {allKhoIn && allKhoIn.length > 0 && allKhoIn.map(item => {
                                return <li key={item.id} className="d-flex justify-content-between align-items-center border-bottom pb-2 pt-2">
                                    <div className="box-info">
                                        <span>{item.left}x{item.right}</span>
                                    </div>
                                    <div className="box-action">
                                        <button className="btn btn-secondary mr-2">Edit</button>
                                        <button className="btn btn-danger">Xóa</button>
                                    </div>
                                </li>
                            })}
                        </div>
                    </div>
                </div>
                <div className="col-md-6 mb-4">
                    <div className="card card-primary card-outline text-sm mb-0">
                        <div className="card-header d-flex align-items-center">
                            <h3 className="card-title m-0">Danh sách mặt in</h3>
                            <button className="btn btn-primary ml-2"
                                onClick={(e) => setShowForm({ ...showForm, mat_in: true })}
                            >Thêm</button>
                        </div>
                        <div className="card-body pb-3 pt-3">
                            {
                                showForm.mat_in &&
                                <form>
                                    <div className="mb-3">
                                        <label htmlFor="mat_in_name" className="form-label">Tên mặt in</label>
                                        <input type="text"
                                            value={formMatIn.name}
                                            onChange={(e) => setFormMatIn({ ...formMatIn, name: e.target.value })}
                                            className="form-control" id="mat_in_name" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="mat_in_percent" className="form-label">Mặt in percent</label>
                                        <input type="number"
                                            value={formMatIn.percent}
                                            onChange={(e) => setFormMatIn({ ...formMatIn, percent: e.target.value })}
                                            className="form-control" id="mat_in_percent" />
                                    </div>
                                    <button type="submit"
                                        disabled={!formMatIn.name || !formMatIn.percent}
                                        className="btn btn-success">Lưu mặt in</button>
                                </form>
                            }
                            {allMatIn && allMatIn.length > 0 && allMatIn.map(item => {
                                return <li key={item.id} className="d-flex justify-content-between align-items-center border-bottom pb-2 pt-2">
                                    <div className="box-info d-flex align-items-center">
                                        <div className="box-info-name">{item.name}</div>
                                        <div className="box-info-percent">{item.percent}</div>
                                    </div>
                                    <div className="box-action">
                                        <button className="btn btn-secondary mr-2">Edit</button>
                                        <button className="btn btn-danger">Xóa</button>
                                    </div>
                                </li>
                            })}
                        </div>
                    </div>
                </div>
                <div className="col-md-6 mb-4">
                    <div className="card card-primary card-outline text-sm mb-0">
                        <div className="card-header d-flex align-items-center">
                            <h3 className="card-title m-0">Danh sách quy cách</h3>
                            <button className="btn btn-primary ml-2"
                                onClick={(e) => setShowForm({ ...showForm, quy_cach: true })}
                            >Thêm</button>
                        </div>
                        <div className="card-body pb-3 pt-3">

                            {
                                showForm.quy_cach &&
                                <form>
                                    <div className="mb-3">
                                        <label htmlFor="quy_cach_name" className="form-label">Tên quy cách</label>
                                        <input type="text"
                                            value={formQuyCach.name}
                                            onChange={(e) => setFormQuyCach({ ...formQuyCach, name: e.target.value })}
                                            className="form-control" id="quy_cach_name" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="quy_cach_point" className="form-label">Percent</label>
                                        <input type="number"
                                            value={formQuyCach.percent}
                                            onChange={(e) => setFormQuyCach({ ...formQuyCach, point: e.target.value })}
                                            className="form-control" id="quy_cach_point" />
                                    </div>
                                    <button type="submit"
                                        disabled={!formQuyCach.name || !formQuyCach.point}
                                        className="btn btn-success">Lưu quy cách</button>
                                </form>
                            }
                            {allQuyCach && allQuyCach.length > 0 && allQuyCach.map(item => {
                                return <li key={item.id} className="d-flex justify-content-between align-items-center border-bottom pb-2 pt-2">
                                    <div className="box-info d-flex align-items-center">
                                        <div className="box-info-name">{item.name}</div>
                                        <div className="box-info-point">{item.point}</div>
                                    </div>
                                    <div className="box-action">
                                        <button className="btn btn-secondary mr-2">Edit</button>
                                        <button className="btn btn-danger">Xóa</button>
                                    </div>
                                </li>
                            })}
                        </div>
                    </div>
                </div>
                <div className="col-md-6 mb-4">
                    <div className="card card-primary card-outline text-sm mb-0">
                        <div className="card-header d-flex align-items-center">
                            <h3 className="card-title m-0">Danh sách số lượng</h3>
                            <button className="btn btn-primary ml-2"
                                onClick={(e) => setShowForm({ ...showForm, so_luong: true })}
                            >Thêm</button>
                        </div>
                        <div className="card-body pb-3 pt-3">
                            {
                                showForm.so_luong &&
                                <form>
                                    <div className="mb-3">
                                        <label htmlFor="so_luong_name" className="form-label">Tên số lượng</label>
                                        <input type="text"
                                            value={formSoLuong.name}
                                            onChange={(e) => setFormSoLuong({ ...formSoLuong, name: e.target.value })}
                                            className="form-control" id="so_luong_name" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="so_luong_count" className="form-label">Số items</label>
                                        <input type="number"
                                            value={formSoLuong.count}
                                            onChange={(e) => setFormSoLuong({ ...formSoLuong, count: e.target.value })}
                                            className="form-control" id="so_luong_count" />
                                    </div>
                                    <button type="submit"
                                        disabled={!formSoLuong.name || !formSoLuong.count}
                                        className="btn btn-success">Lưu số lượng</button>
                                </form>
                            }
                            {allSoLuong && allSoLuong.length > 0 && allSoLuong.map(item => {
                                return <li key={item.id} className="d-flex justify-content-between align-items-center border-bottom pb-2 pt-2">
                                    <div className="box-info d-flex align-items-center">
                                        <div className="box-info-name">{item.name}</div>
                                        <div className="box-info-count">{item.count}</div>
                                    </div>
                                    <div className="box-action">
                                        <button className="btn btn-secondary mr-2">Edit</button>
                                        <button className="btn btn-danger">Xóa</button>
                                    </div>
                                </li>
                            })}
                        </div>
                    </div>
                </div>
                <div className="col-md-6 mb-4">
                    <div className="card card-primary card-outline text-sm mb-0">
                        <div className="card-header d-flex align-items-center">
                            <h3 className="card-title m-0">Danh sách thời gian</h3>
                            <button className="btn btn-primary ml-2"
                                onClick={(e) => setShowForm({ ...showForm, thoi_gian: true })}
                            >Thêm</button>
                        </div>
                        <div className="card-body pb-3 pt-3">
                            {
                                showForm.thoi_gian &&
                                <form>
                                    <div className="mb-3">
                                        <label htmlFor="thoi_gian_name" className="form-label">Tên thời gian</label>
                                        <input type="text"
                                            value={formThoiGian.name}
                                            onChange={(e) => setFormThoiGian({ ...formThoiGian, name: e.target.value })}
                                            className="form-control" id="thoi_gian_name" />
                                    </div>
                                    <div className="mb-3">
                                        <label htmlFor="thoi_gian_percent" className="form-label">Percent</label>
                                        <input type="number"
                                            value={formThoiGian.percent}
                                            onChange={(e) => setFormThoiGian({ ...formThoiGian, percent: e.target.value })}
                                            className="form-control" id="thoi_gian_percent" />
                                    </div>
                                    <button type="submit"
                                        disabled={!formThoiGian.name || !formThoiGian.percent}
                                        className="btn btn-success">Lưu thời gian</button>
                                </form>
                            }
                            {allThoiGian && allThoiGian.length > 0 && allThoiGian.map(item => {
                                return <li key={item.id} className="d-flex justify-content-between align-items-center border-bottom pb-2 pt-2">
                                    <div className="box-info d-flex align-items-center">
                                        <div className="box-info-name">{item.name}</div>
                                        <div className="box-info-percent">{item.percent}</div>
                                    </div>
                                    <div className="box-action">
                                        <button className="btn btn-secondary mr-2">Edit</button>
                                        <button className="btn btn-danger">Xóa</button>
                                    </div>
                                </li>
                            })}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <StrictMode>
        <SettingApp />
    </StrictMode>
);