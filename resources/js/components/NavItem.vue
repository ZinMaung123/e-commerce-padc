<template>
    <li class="nav-item">
        <a class="nav-link active" :href="href">
            <slot></slot>
        </a>
    </li>  
</template>
<script>
export default {
    props : ['href']
}
</script>