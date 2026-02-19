<div class="card mb-4">
    <div class="card-header p-4" style="
        background: linear-gradient(135deg, #e7f1fb, #d6e8f7); /* biru lembut */
        border-left: 6px solid #61b9f3; /* navy */
        border-radius: 14px;
        display: flex;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    ">
        <div class="d-flex align-items-center gap-3 w-100">
            <div>
                <img src="/assets/abgblora/logo/logobangunangedungblora.png" alt="icon" style="
                    width:50px;
                    height:50px;
                    object-fit:contain;
                ">
            </div>

            <div>
                <div style="
                    font-size:18px;
                    font-weight:700;
                    color:#0b3c5d; /* navy */
                ">
                    {{ $title }}
                </div>
                <div style="
                    font-size:13px;
                    color:#4a6f8a; /* biru keabu */
                ">
                    Aplikasi Pendataan Bangunan Gedung Kabupaten Blora
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.halaman-title {
    margin-bottom: 10px;
    font-weight: 900;
    font-size: 16px;
    text-align: center;
    color: white;
    padding: 10px 25px;
    border-radius: 10px;
    display: inline-block;
    width: 100%;
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
    background: linear-gradient(
        135deg,
        #0b3c5d,
        #1f6fb2,
        #0b3c5d
    ); /* navy gradient */
    background-size: 300% 300%;
    animation: gradientShift 6s ease infinite;
    font-family: 'Poppins', sans-serif;
}
</style>
