<div style="height:90vh">
<form  class="d-flex flex-column justify-content-center align-content-center"  >
    <div class="row m-2">
        <div class="p-2 d-flex justify-content-center">
            <input required readonly type="text" class="form-control text-center" placeholder="USERNAME" style="width: 300px; height: 50px; border-radius: 5px;">
        </div>

        <div class="p-2 d-flex justify-content-center">
            <input required readonly type="text" class="form-control text-center" placeholder="EMAIL" style="width: 300px; height: 50px; border-radius: 5px;">
        </div>

        <div class="p-2 d-flex justify-content-center">
            <input required type="text" class="form-control text-center" placeholder="MOT DE PASSE" style="width: 300px; height: 50px; border-radius: 5px;">
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-25 h-25 d-flex justify-content-center mx-auto">MODIFIER</button>
</form>
</div>

<style>
    body, html {
    height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
}
form{
    flex: 1; /* Fills the remaining space */
    overflow: auto; /* Prevents content overflow */
}
</style>
