// resources/js/orders.js

let cart = [];
let cartServices = [];

window.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementById("search");

    search?.addEventListener("input", function () {
        let q = this.value;

        if (q.length < 2) return;

        fetch(`/products/search?q=${q}`)
            .then((res) => res.json())
            .then((data) => {
                let html = "";

                data.forEach((p) => {
                    html += `
                        <a href="#" class="list-group-item"
                           onclick="addProduct(${p.id}, '${p.name}', ${p.unit_price})">
                            ${p.name} - $${p.unit_price}
                        </a>
                    `;
                });

                document.getElementById("results").innerHTML = html;
            });
    });

    //Servicios
    const searchServices = document.getElementById("search-services");

    searchServices?.addEventListener("input", function () {
        let q = this.value;

        if (q.length < 2) return;

        fetch(`/services/search?q=${q}`)
            .then((res) => res.json())
            .then((data) => {
                let html = "";

                data.forEach((p) => {
                    html += `
                        <a href="#" class="list-group-item"
                           onclick="addService(${p.id}, '${p.name}', ${p.price})">
                            ${p.name} - $${p.price}
                        </a>
                    `;
                });

                document.getElementById("results-services").innerHTML = html;
            });
    });

    //Edit
    if (!window.orderEdit) {
        return;
    }

    // Cliente
    document.getElementById("customer").value = window.orderEdit.customer;

    // Productos
    window.orderEdit.order_products.forEach((item) => {
        cart.push({
            id: item.product.id,
            name: item.product.name,
            price: parseFloat(item.price),
            quantity: item.quantity,
        });
    });

    // Servicios
    window.orderEdit.order_services.forEach((item) => {
        cartServices.push({
            id: item.service.id,
            name: item.service.name,
            price: parseFloat(item.price),
            quantity: item.quantity,
            discount: item.discount_percent,
            //discount: number_format(item.discount_percent, 0, ',', '.'),
        });
    });

    render();
});

// funciones globales (para Blade)
window.addProduct = function (id, name, price) {
    let item = cart.find((i) => i.id === id);

    if (item) {
        item.quantity++;
    } else {
        cart.push({ id, name, price, quantity: 1 });
    }

    // limpiar resultados
    document.getElementById("results").innerHTML = "";

    // limpiar input
    search.value = "";
    document.getElementById("search-services").value = "";

    render();
};

window.addService = function (id, name, price, quantity = 1) {
    let item = cartServices.find((i) => i.id === id);
    if (item) {
        item.quantity++;
    } else {
        cartServices.push({ id, name, price, quantity: 1, discount: 0 });
    }

    // limpiar resultados
    document.getElementById("results-services").innerHTML = "";

    // limpiar input
    document.getElementById("search-services").value = "";
    render();
};

window.removeItem = function (id) {
    cart = cart.filter((i) => i.id !== id);
    render();
};

window.removeItemService = function (id) {
    cartServices = cartServices.filter((i) => i.id !== id);
    render();
};

window.updateQty = function (id, qty) {
    let item = cart.find((i) => i.id === id);
    item.quantity = parseInt(qty);
    render();
};

window.updateQtyService = function (id, qty) {
    let item = cartServices.find((i) => i.id === id);
    item.quantity = parseInt(qty);
    render();
};

window.updateDiscountService = function (id, discount) {
    let item = cartServices.find((i) => i.id === id);

    item.discount = parseFloat(discount) || 0;

    render();
};

function render() {
    let tbody = "";
    let total = 0;

    let tbodyService = "";
    let totalService = 0;

    cart.forEach((item) => {
        let subtotal = item.quantity * item.price;
        total += subtotal;

        tbody += `
            <tr>
                <td>${item.name}</td>
                <td>${item.price}</td>
                <td>
                    <input type="number" value="${item.quantity}"
                        onchange="updateQty(${item.id}, this.value)">
                </td>
                <td>${subtotal.toFixed(2)}</td>
                <td>
                    <button onclick="removeItem(${item.id})">X</button>
                </td>
            </tr>
        `;
    });

    document.getElementById("cart").innerHTML = tbody;
    document.getElementById("total").innerText = total.toFixed(2);

    //Service
    cartServices.forEach((item) => {
        let subtotalS = item.quantity * item.price;

        let discountValue = (subtotalS * (item.discount || 0)) / 100;

        subtotalS -= discountValue;

        totalService += subtotalS;

        tbodyService += `
            <tr>
                <td>${item.name}</td>
                <td>${item.price}</td> 
                   <td>
                    <input type="number" value="${item.quantity}"
                        onchange="updateQtyService(${item.id}, this.value)">
                </td>
                  <td>
                    <input
                        type="number"
                        min="0"
                        max="100"
                        value="${parseFloat(item.discount ?? 0)}"
                        oninput="updateDiscountService(${item.id}, this.value)">
                  </td>
                <td style="text-align: left;">${subtotalS.toFixed(2)}</td>            
               
                <td>
                    <button onclick="removeItemService(${item.id})">X</button>
                </td>
            </tr>
        `;
    });

    document.getElementById("cart-services").innerHTML = tbodyService;
    document.getElementById("total-services").innerText =
        totalService.toFixed(2);
}

window.saveOrder = function () {
    fetch("/orders", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({
            customer: document.getElementById("customer").value,
            total: document.getElementById("total").innerText,
            total_services: document.getElementById("total-services").innerText,
            products: cart,
            services: cartServices,
        }),
    })
        .then((res) => res.json())
        .then(() => {
            alert("Presupuesto guardado");
            cart = [];
            cartServices = [];
            document.getElementById("customer").value = "";
            render();
            window.location.href = "/orders";
        });
};

window.updateOrder = function () {
    let data = {
        customer: document.getElementById("customer").value,
        total: document.getElementById("total").innerText,
        total_services: document.getElementById("total-services").innerText,
        products: cart,
        services: cartServices,
    };

    const order = window.orderEdit; //lo que  mando del edit.blade

    const url = `/orders/${order.id}`;

    console.log(url);

    fetch(url, {
        method: "PUT",

        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },

        body: JSON.stringify(data),
    })
        .then((res) => res.json())
        .then(() => {
            alert("Presupuesto modificado");
            cart = [];
            cartServices = [];
            document.getElementById("customer").value = "";
            render();
            window.location.href = "/orders";
        });
};
