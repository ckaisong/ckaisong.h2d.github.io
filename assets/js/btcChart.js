let LINEDATA = [];
let data = [];
let labels = [];

graph();
setInterval("graph()", 30000);

function graph() {
    axios
        .get(
            `https://api.coindesk.com/v1/bpi/historical/close.json?start=${moment(
                new Date()
            )
                .subtract(1, "month")
                .format("YYYY-MM-DD")}&end=${moment(new Date()).format("YYYY-MM-DD")}`
        )
        .then((response) => {
                LINEDATA = {...response.data.bpi};
                data = Object.keys(LINEDATA).map((key) => LINEDATA[key]);
                labels = Object.keys(LINEDATA);
                console.log(data);
                console.log(labels);
                new Chart(document.getElementById("myAreaChart"), {
                    type: "line",
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: "Bitcoin",
                                data: data,
                                borderColor: "#3e95cd"
                            }
                        ]
                    }
                });
            }
        )

}
