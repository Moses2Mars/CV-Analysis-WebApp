<template>
  <div class="candidate-grid">     
    <img :src='require("../../"+candidate.image_path)' class="image">
    <span class="full-name"> {{candidate.first_name}} {{candidate.last_name}}</span>
    <span class="email"> {{candidate.user_email}} </span>
    <span class="full-address"> {{candidate.country}}, {{candidate.address}} </span>
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
.candidate-grid {
    margin: 2%;
    display: grid;
    grid-template-columns: 1fr 1fr 2fr 2fr;
    align-items: center;
    justify-items: center;
    background-color: rgb(82, 188, 250);
    padding: 1%;
    border-radius: 15px;
    transition: 0.5s;
}
.candidate-grid:hover {
    background-color: rgb(39, 145, 207);
    transform: scale(1.02);
    cursor: pointer;
}
.image {
    object-fit: cover;
    grid-column: 1/2;
    grid-row: 1/2;
    width: 100px; 
    height: 100px;
    aspect-ratio: 1/1;
    vertical-align: middle;
    border-radius: 20%;
}
.full-name {
    grid-row: 1/2;
    grid-column: 2/3;
    font-size: 130%;
    font-weight: 600;
}
.email {
    grid-row: 1/2;
    grid-column: 3/4;
    font-size: 120%;
}
.full-address {
    grid-row: 1/2;
    grid-column: 4/5;
    font-size: 110%;
}
</style>