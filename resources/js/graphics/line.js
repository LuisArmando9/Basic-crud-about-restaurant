export default class Line {
    data;
    max;
    yValues =[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
    constructor(data) {
        this.data = data;

    }
    
    getXValues() {
        return this.data.hours;   
    }

    plot(id) {
        new Chart(id, {
            type: "line",
            data: {
              labels: this.getXValues(),
              datasets: [{
                borderColor: "rgba(0,0,0,0.1)",
                data: this.yValues
              }]
            },
            options:{
                animation: {
                    duration: 0 // general animation time
                },
                legend: { display: false },
                scales: {
                    xAxes: [{
                        display: true,
                    ticks: {
                        beginAtZero: true,
                        min: 0,
                        stepSize: 1,
                    },
                    scaleLabel: {
                      display: true,
                      labelString: 'NÚMERO DE ORDENOS POR HORA'
                    }
                  }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            stepSize: 1,
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'HORAS'
                        }
                    }],
                },
                title: {
                    display: true,
                    text: "Horario de ventas"
                }

            }
          });

    }

}