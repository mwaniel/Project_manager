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
    margin:1em auto 0 auto;
    overflow:hidden;
}
</style>
