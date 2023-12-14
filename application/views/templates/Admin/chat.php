<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>css/chat.css" type="text/css">
    
</head>
<body>
    <input type="checkbox" id="check"> 
    <label style="position: fixed" class="chat-btn" for="check"> <i style="position: fixed" class="fa fa-whatsapp"></i> <i style="position: fixed" class="fa fa-close close"></i> </label> 
    <div style="position: fixed" class="wrapper"> 
        <div  class="header"> 
            <h6 style="color: white;">Let's Chat - Online</h6> 
        </div> 
        <div class="text-center p-2"> 
            <span>Please fill out the form to start chat via whatsapp!</span> 
        </div> 
        <div class="chat-form" id="chatForm"> 
            <!-- Form WhatsApp yang ingin disembunyikan -->
            <br>
            <center>
                <a target="_blank" href="https://wa.me/6289765455332">
                    <img type="button" width="80px" src="<?= base_url('assets/') ?>img/whatsapp.png" alt="WhatsApp">
                </a>
            </center>
            <br>
            <a target="_blank" href="https://wa.me/6289765455332" class="btn btn-primary btn-block">Submit</a> 
        </div> 
    </div>

    <script>
        // Dapatkan elemen wrapper
        const wrapper = document.querySelector(".wrapper");

        // Sembunyikan wrapper saat halaman dimuat
        wrapper.style.display = "none";

        // Tambahkan event listener untuk klik pada chat button
        document.querySelector(".chat-btn").addEventListener("click", () => {
            // Jika wrapper ditampilkan, sembunyikan wrapper
            if (wrapper.style.display !== "none") {
                wrapper.style.display = "none";
            } else { // Jika wrapper disembunyikan, tampilkan wrapper
                wrapper.style.display = "block";
            }
        });
    </script>

</body>
</html>