VNS_FRAMEWORK.PopupVirtual = function(){
    function random(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    class Queue {
        constructor() {
            this.data = [];
        }

        set(item) {
            this.data = [item, ...this.data];
        }

        remove() {
            this.data = this.data.slice(0, -1);
        }

        removeAll() {
            this.data = [];
        }

        get() {
            return this.data;
        }
    }

    class ProductFakeView {
        constructor(options) {
            this.queue = new Queue();
            this.element = options.element;
            this.delay = options.delay || 3000;
            this.data = options.data || [];
            this.dataRandom = this.data;
            this.intervalId1 = -1;
            this.intervalId2 = -1;
            this.timeoutId = -1;
            this.currentId = null;
            this.init();
        }

    renderProductCard({ productName,productImage,productDesc }) {
        return `
        <div class="box-virtual">
            <img src="thumbs/150x120x1/upload/news/${productImage}?>" alt="${productName}">
            <div style="color: red">
                <h3>${productName}</h3>
                <p>${productDesc}</p>
                <p class="close-box-virtual" onclick="this.close()" >Close</p>
            </div>

        </div>
        `;
    }

    render() {
        const data = this.queue.get();
        if (data.length === 0) {
            return ``;
        }
        return `
            <div class="popup-virtual">
            ${data
                .map((item) => {
                    return this.renderProductCard({ productName: item.ten ,productImage: item.photo,productDesc: item.mota });

                })
                .join("")}
            <div style="width: 100%; animation-duration: ${
                this.delay / 2
            }ms" class="progress"></div>
            </div>
        `;
    }

    setHtml() {
        this.element.innerHTML = this.render();
    }

    init() {
        this.intervalId1 = setInterval(() => {
            const checked = this.dataRandom.some((i) => i.id === this.currentId);
        if (checked) {
            this.dataRandom = this.data.filter((i) => i.id !== this.currentId);
        }
        const index = random(0, this.dataRandom.length - 1);
        const item = this.dataRandom[index];
        this.currentId = item.id;
        this.queue.set(item);
        this.setHtml();
        // console.log(this.queue.get());
        }, this.delay);

        this.timeoutId = setTimeout(() => {
        this.intervalId2 = setInterval(() => {
            this.queue.remove();
            this.setHtml();
            // console.log(this.queue.get());
        }, this.delay);
        }, this.delay / 2);
    }
    close(){
        this.queue.remove();
    }
    destroy() {
        this.queue.removeAll();
        clearInterval(this.intervalId1);
        clearInterval(this.intervalId2);
        clearTimeout(this.timeoutId);
        this.element.innerHTML = "";
    }
    }

    new ProductFakeView({
    element: document.querySelector("#demoweb"),
    delay: 3000,
    data: datavirtual,
    });
}
// Css

// #demoweb {
//     display: block;
//     position: fixed;
//     bottom: 10px;
//     left: 10px;
//     z-index: 20;
//   }

//   .progress {
//     width: 0;
//     height: 2px;
//     background-color: red;
//     animation: progress;
//   }

//   @keyframes progress {
//     0% {
//       width: 100%;
//     }
//     100% {
//       width: 0;
//     }
//   }

//   .box-virtual{display: flex; align-items: center; justify-content: space-between; background-color: rgb(76, 76, 226);}


//   .responsive-item{
//     overflow: auto;
// }