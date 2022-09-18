<template>
    <div  class="candidate-flex">     
        <img :src='require("../../"+candidate.image_path)' class="image">
        <span class="full-name"> {{candidate.first_name}} {{candidate.last_name}}</span>
        <div class="potential"> {{candidate.percentage}}% </div>
    </div>
</template>

<script>
export default {
    props: {
        candidate: {
            default: null,
            type: undefined,
        }
    }
}
</script>

<style scoped>
.candidate-flex {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: rgb(82, 188, 250);
    padding: 1em;
    border-radius: 15px;
    transition: 0.5s;
    text-decoration: none;
    color: black;
}
.candidate-flex:hover {
    background-color: rgb(55, 182, 255);
    transform: scale(1.02);
    cursor: pointer;
}
.image {
    object-fit: cover;
    width: 100px; 
    height: 100px;
    aspect-ratio: 1/1;
    vertical-align: middle;
    border-radius: 20%;
}
.full-name {
    font-size: 130%;
    font-weight: 600;
}
.potential {
    font-size: 110%;
}
</style>