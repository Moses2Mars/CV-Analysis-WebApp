<template>
    <div class="job-info-grid">
        <div class="header-section">
            <img :src="require('../../'+job_info.company_logo)" class="company-image">
            <span class="position"> {{job_info.position_required}} </span>
            <span class="field"> {{job_info.field_required}} </span>
            <span class="company-name"> {{job_info.company_name}}</span>
            <span class="address"> {{job_info.address}}</span>
            <button class="btn-post fw-bold apply-btn" @click="applyToJob"> Apply For This Job </button>          
        </div>
        <div class="body">
            {{job_info.job_description}}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        job_info: {
            default: null,
            type: undefined
        },
    },
    methods: {
        async applyToJob() {
            
            if(!this.isLoggedIn)
                return this.$router.push('/login')
            
            if(this.userPurpose == 'recruiter')
                return this.$vToastify.error('Please Login As A Candidate First!')
                
            this.$emit('showJobDetails', false)
        }
    },
    computed: {
        isLoggedIn() {
            return this.$store.getters['login_module/getLoggedInStatus']
        },
        userPurpose() {
            return this.$store.getters['login_module/getPurpose']
        }
    }
}
</script>

<style scoped>
.job-info-grid {
    display: flex;
    flex-direction: column;
    margin-top: 40px;
}
.header-section {
    margin-left: 3%;
    display: grid;
    grid-template-columns: 1fr 4fr 1fr;
    grid-template-rows: 1fr 1fr 1fr 1fr;
    justify-items: left;
}
.company-image {
    object-fit: contain;
    grid-column: 1/2;
    grid-row: 1/5;
    width: 100%; 
    height: 100%;
    aspect-ratio: 1/1;
    justify-self: center;
    align-self: center;
    border-radius: 20%;
}
.position {
    grid-column: 2/3;
    grid-row: 1/2;
    margin-left: 40px;
}
.field {
    grid-column: 2/3;
    grid-row: 2/3;
    margin-left: 40px;
}
.company-name {
    grid-column: 2/3;
    grid-row: 3/4;
    margin-left: 40px;   
}
.address {
    grid-column: 2/3;
    grid-row: 4/5;
    margin-left: 40px;
}
.apply-btn {
    grid-column: 3/4;
    grid-row: 2/4;
    margin-right: 40px;
}
.body {
    display: flex;
    background: rgb(250, 250, 250);
    margin-top: 40px;
    padding-left: 40px;
    height: 100%;
    text-align: left;
    margin-bottom: 40px;
}
</style>