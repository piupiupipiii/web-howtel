$(document).ready(function () {
    // JS1 - Tanggal Check-in dan Check-out
    var currentDateTime = new Date();
    var year = currentDateTime.getFullYear();
    var month = (currentDateTime.getMonth() + 1);
    var date = (currentDateTime.getDate() + 1);

    if (date < 10) {
        date = '0' + date;
    }
    if (month < 10) {
        month = '0' + month;
    }

    var dateTomorrow = year + "-" + month + "-" + date;
    var checkinElem = $("#checkin-date");
    var checkoutElem = $("#checkout-date");

    checkinElem.attr("min", dateTomorrow);

    checkinElem.on("change", function () {
        checkoutElem.attr("min", this.value);
    });

    // JS2 - Room Information
    // Dummy data for room information
    const roomData = [
        { image: "superior_santika.jpeg", name: "Superior Room", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.", needs: ["free-cancellation", "free-breakfast"] },
        { image: "deluxe_santika.jpeg", name: "Deluxe Room", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.", needs: ["extra-benefit", "large-bed"] },
        { image: "executive_santika.jpeg", name: "Executive Room", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.", needs: ["free-breakfast", "large-bed"] }
    ];

    // Populate room information table
    const roomInfoTable = $("#roomInfoTable");
    roomData.forEach(room => {
        const needsAttr = room.needs.map(need => `data-need="${need}"`).join(' ');
        roomInfoTable.append(`
            <tr ${needsAttr}>
                <td>
                    <img src="${room.image}" alt="Gambar Kamar">
                </td>
                <td>
                    <h5>${room.name}</h5>
                    <p>${room.description}</p>
                </td>
                <td>
                    <input type="button" value="Pesan Kamar">
                </td>
            </tr>
        `);
    });

    // Handle room booking button click
    roomInfoTable.find('input[type="button"]').on('click', function () {
        alert('Room booked!'); // Replace this with your actual booking logic
    });

    // Fungsi untuk menyaring kamar berdasarkan kriteria "Search by Need"
    function filterRooms() {
        // Ambil semua checkbox yang dicentang
        var selectedNeeds = $('input[data-need]:checked').map(function () {
            return $(this).data('need');
        }).get();

        // Sembunyikan semua kamar
        roomInfoTable.find('tr').hide();

        // Tampilkan hanya kamar yang memenuhi kriteria
        if (selectedNeeds.length > 0) {
            selectedNeeds.forEach(function (need) {
                roomInfoTable.find(`tr[data-need*="${need}"]`).show();
            });
        } else {
            // Jika tidak ada kriteria yang dipilih, tampilkan semua kamar
            roomInfoTable.find('tr').show();
        }
    }

    // Event handler untuk setiap perubahan pada checkbox
    $('input[data-need]').change(function () {
        filterRooms();
    });

    // Inisialisasi pemfilteran kamar
    filterRooms();
});
