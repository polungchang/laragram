<template>
    <div>
        <button type="button" class="btn btn-primary ml-4" @click="followUser()" v-text="statusText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'isFollowing'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.isFollowing,
            }
        },

        computed: {
            statusText() {
                return this.status ? 'Unfollow' : 'Follow';
            },
        },

        methods: {
            followUser: function () {

                if (this.status) {
                    axios.put('/follow/'+this.userId)
                    .then(respone => {
                        this.status = ! this.status;
                        console.log(respone.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
                } else {
                    axios.post('/follow/'+this.userId)
                    .then(respone => {
                        this.status = ! this.status;
                        console.log(respone.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });;                    
                }
            }
        }
    }
</script>
