export default class Bar {
    data;
    barColors = ["red", "green", "blue", "orange", "brown"];
    max;
    constructor(data) {
        this.data = data[0];
        this.max = data.count;

    }
    getValues(element) {
        var values = [];
        this.data.forEach(food => {
            values.push(food[element]);
        });
        console.log(values)
        return values;
    }
    getXValues() {
        return this.getValues("name");
    }
    getYValues() {
        return this.getValues("count");
    }
    plot(id) {
        new Chart(id, {
            type: "bar",
            data: {
                labels: this.getXValues(),
                datasets: [{
                    backgroundColor: this.barColors,
                    data: this.getYValues()
                }]
            },
            options: {
                animation: {
                    duration: 0 // general animation time
                },
                legend: { display: false },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            max: this.max,
                            stepSize: 100,
                        }
                    }],
                },
                title: {
                    display: true,
                    text: "5 productos mas vendidos"
                }
            }
        });

    }

}