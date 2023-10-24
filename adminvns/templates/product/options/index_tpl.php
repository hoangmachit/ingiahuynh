<div id="wrapper-options">
    <div id="root"></div>
    <script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
    <script crossorigin
        src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/babel-standalone@6.26.0/babel.min.js"></script>
    <script type="text/babel">
        const API = '<?=$linkView?>/adminvns/ajax';
        const { useState, useEffect, StrictMode } = React;
        function OptionsApp() {
            const [count,setCount] = useState(0);
            return (
                <div>
                    Welcome to REACT JS
                    <p>Count:{count}</p>
                    <button
                    onClick={()=>setCount(count+1)}
                    >Count: { count}</button>
                </div>
            )
        }
        const root = ReactDOM.createRoot(document.getElementById('root'));
        root.render(
            <StrictMode>
                <OptionsApp />
            </StrictMode>
        );
    </script>
</div>
