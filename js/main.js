const labels = [
    "Normaal Nieuws",
    "Breaking",
];


const data = {
    labels: labels,

    datasets: [
        {
            label: "News",
            data: [300, 400,],
            backgroundColors: ["#FFF2CC", "#FFD966", "#FFD966", "#408E91", "#B46060"]
        }
    ]
}

const config = {
    type: "doughnut",
    data: data,
}

const chart1 = new Chart(document.getElementById("js--chart--1"), config);