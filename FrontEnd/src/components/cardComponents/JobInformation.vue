<template>
    <div class="job-info-grid">
        <div class="header-section">
            <div class="left-header">
                <img :src="require('../../'+job_info.company_logo)" class="company-image">
                <div class="job-info-section">
                    <span class="job-position"> {{job_info.position_required}} </span>
                    <span class="field"> {{job_info.field_required}} </span>
                    <span class="address"> {{job_info.company_name}} - {{job_info.address}}</span>
                </div>
            </div>
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
    justify-items: center;
    align-items: center;
    padding: 1.5em;
    gap: 1.5em;
}
.header-section {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding-right: 2em;
}
.job-position {
    font-size: 1.3em;
    font-weight: 600;
}
.left-header {
    display: flex;
    flex-direction: row;
    gap: 1em;
    text-transform: capitalize;
}
.job-info-section {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
}
.company-image {
    object-fit: contain;
    width: 8em; 
    height: 100%;
    aspect-ratio: 1/1;
}

.body {
    height: 100%;
    text-align: left;
    margin-bottom: 20px;
}
</style>