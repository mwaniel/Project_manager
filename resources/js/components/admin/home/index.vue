<script setup>
    import {useRouter} from "vue-router"

    const router = useRouter()
    const logout = () => {
        localStorage.removeItem('token')
        router.push('/')
    }
</script>
<template>
    <h1>wlcom to admin page </h1>
    <div>
        <router-link to="/">home page</router-link>
    </div>
    <br>
    <button @click="logout">Logout</button>
</template>
