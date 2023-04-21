<template>
    <div class="login">
        <div class="formLogin">
            <form>
            <input type="email" placeholder="Enter your Email"/>
            <br>
            <input type="password" placeholder="Enter your Password"/>
            <br>
            <input type="submit" value="login"/>
        </form>
        </div>
    </div>

</template>
<style>
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family:'Fira san',sans-serif;
}
.login {
    background:#6c5ce7;
    padding:0;
    margin:0;
    width:100%;
    height:100vh;
}

.formLogin{
    display:flex;
    align-items:center;
    width:22.8em;
    height:55em;
    margin:0 auto 0 auto;
    overflow:hidden;
}
input{
    background:rgba(228, 232, 243,0.8);
    background-position:0.5em 0.6em;
    border:none;
    color:rgba(80, 80, 80, 1);
    padding:0 0 0 4rem;
    margin:0 0 1em 0;
    width: 20em;
    height:2.8em;
    outline:none;
    transition:background-color 0.4s;
}
</style>
