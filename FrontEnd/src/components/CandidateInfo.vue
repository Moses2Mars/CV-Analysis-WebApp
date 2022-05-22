<template>
    <div class="main-candidate-grid">
        <img :src='require("../"+candidate.image_path)' class="image">
        <div class="candidate-flex">
            <div class="candidate-item"> <b style="color: black;">Name:</b> {{candidate.first_name}} {{candidate.last_name}}</div>
            <div class="candidate-item"><b style="color: black;">Contact Email:</b> {{candidate.user_email}}</div>
            <div class="candidate-item"><b style="color: black;">DOB:</b> {{candidate.birth_date}}</div>
            <div class="candidate-item" style="text-transform: capitalize;"><b style="color: black;">Address:</b> {{candidate.country}}, {{candidate.address}}</div>
            <div class="candidate-item"><b style="color: black;">Field and Experience:</b> {{candidate.field}}, {{candidate.experience}} Years</div>
            <div class="candidate-item">
                <b style="color: black;">Potential:</b> {{candidate.percentage}}% 
                <span 
                    :class="candidate.percentage >= 50 && candidate.percentage <= 70 ? 'medium' : candidate.percentage > 70 ? 'high' : 'low'">
                </span>
            </div>
            <div class="button-flex">
                <button class="btn-delete fw-bold" @click="$emit('viewAllCandidates')"> Back </button>
                <a class="btn-post fw-bold href-style" :href="candidate.resume" :download="candidate.first_name+' '+candidate.last_name"> Download CV </a>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        candidate: {
            default: null,
        }
    },
}
</script>

<style scoped>
.main-candidate-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    height: 100%;
    align-items: center;
    gap: 1em;
    padding: 1em;
}
.candidate-item {
    font-size: 1.5em;
}
.button-flex {
    display: flex;
    flex-direction: row;
    justify-items: center;
    align-items: center;
    gap: 2em;
    margin-top: 1em;
}
.candidate-flex {
    grid-column: 2/3;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
    gap: 0.5em;
    text-align: left;
}
.href-style {
    text-decoration: none;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}
.image {
    grid-column: 1/2;
    width: 30em;
    object-fit: cover;
    aspect-ratio: 1/1;
    vertical-align: middle;
    border-radius: 20%;
}

.medium {
    color: yellow;
    font-weight: 600;
}
.medium::after {
    content: 'Medium Potential'
}

.high {
    color: green;
    font-weight: 600;
}
.high::after {
    content: 'High Potential';
    font-weight: 600;
}

.low {
    color: red;
}
.low::after {
    content: 'Low Potential';
    font-weight: 600;
}
</style>