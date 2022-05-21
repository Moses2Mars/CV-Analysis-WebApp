<template>
    <div class="card-outline" :class="job.state">
        <span class="job-header">{{job.position_required}} - {{job.company_name}}</span>
        <div class="job-field"> 
            <span class="static-text"> Field: </span> {{job.field_required}}
        </div>
        <div class="two-dates">
            <div>
                <span class="static-text"> Released: </span> 
                {{job.release_date}}
            </div>
            <div>
                <span class="static-text"> Expires: </span>
                {{job.expiry_date}} 
            </div>
        </div>
        <span class="applicants-applied" v-if="!is_candidate"> 
            <span class="static-text"> Applicants:</span> 
            {{job.applicants_applied}}
        </span> 
        <span v-if="!is_candidate" class="job-list-state">
            <span class="static-text"> State: </span>
            {{job.state}}
        </span> 
    </div>
</template>

<script>
export default {
    props: {
        job: {
            default: null,
            type: undefined,
        },
        is_candidate: {
            default: false,
            type: Boolean,
        }
    },
}
</script>

<style scoped>
.card-outline {
    width: 30rem;
    height: 10rem;
    border-radius: 8px;
    transition: 0.3s;
    cursor: pointer;
    -webkit-box-shadow: 8px 10px 10px -3px #909090; 
    box-shadow: 8px 10px 10px -3px #909090;
    display: flex;
    flex-direction: column;
    gap: 1em;
    align-items: center;
    justify-content: center;
    text-transform: capitalize;
}

.static-text {
    font-weight: 600;
}
.two-dates {
    display: flex;
    flex-direction: row;
    gap: 1em;
}
.job-header {
    font-size: 1.5em;
    font-weight: 600;
    text-transform: capitalize;
}
.Running {
    background-color: rgb(96, 199, 82);
}
.Running:hover {
    background-color: rgb(63, 177, 48);
}
.Complete {
    background-color: rgb(95, 95, 95);
    color: white;
}
.Complete:hover {
    background-color: rgb(59, 59, 59);
}

.Scheduled {
    background-color: rgb(243, 111, 111);
}
.Scheduled:hover {
    background-color: rgb(231, 66, 66);
    cursor: pointer;
}

</style>