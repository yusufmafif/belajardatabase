document.getElementById("myForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const no = document.getElementById("no").value;
    const namaLengkap = document.getElementById("namaLengkap").value;
    const umur = document.getElementById("umur").value;
    const premis = document.getElementById("premis").value;

    const data = {
        no: no,
        namaLengkap: namaLengkap,
        umur: umur,
        premis: premis,
    };

    let url = "/rpul";
    let method = "PUT";
    if (no) {
        // Jika nilai "no" tersedia, maka ini merupakan permintaan PUT
        url = `/rpul/${no}`;
        method = "PUT";
    } else {
        // Jika nilai "no" tidak tersedia, maka ini merupakan permintaan POST
        url = "/rpul";
        method = "POST";
    }


    fetch("http://localhost:3000/rpul", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((result) => {
            console.log(result);
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    fetch("http://localhost:3000/rpul", {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((result) => {
            console.log(result);
        })
        .catch((error) => {
            console.error("Error:", error);
        });

});
