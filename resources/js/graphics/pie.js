export default class Pie {
    data;
    barColors = [
        "#007bff",
        "#28a745",
        "#dc3545",
    ];
    max;
    constructor(data) {
        this.data = data[0];

    }
    getValues(element) {
        var values = [];
        this.data.forEach(food => {
            values.push(food[element]);
        });
        console.log("pie")
        console.log(values)
        return values;
    }
    translateStatus(status) {
        switch (status) {
            case 'DELIVERED':
                return 'ENTREGADO';
            case 'CANCELLED':
                return 'CANCELADO';
            case 'PENDIG':
                return 'PENDIENTE';
        }
    }
    getXValues() {
        var translateValues = [];
        var _this = this;
        this.getValues('status').forEach(value => {
            translateValues.push(_this.translateStatus(value));
        })
        return translateValues;
    }
    getYValues() {
        return this.getValues("count");
    }
    plot(id) {
        new Chart(id, {
            type: "doughnut",
            data: {
                labels: this.getXValues(),
                datasets: [{
                    backgroundColor: this.barColors,
                    data: this.getYValues(),
                }]
            },
            options: {
                animation: {
                    duration: 0 // general animation time
                },
                title: {
                    display: true,
                    text: "STATUS DE LOS PEDIDOS"
                }
            }
        });

    }

}