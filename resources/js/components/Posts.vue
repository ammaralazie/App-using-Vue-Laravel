<template>
    <div>
        <input type="text" name="" v-model="searchInput" id="" />
        <!-- <div v-if="isSearching != true">
           ... wait
       </div> -->
        <div v-if="posts != {}">
            <ul>
                <li v-for="post in posts.data" :key="post.id">
                    <div>
                        <router-link :to="'/posts/' + post.id">{{
                            post.title
                        }}</router-link>
                    </div>
                </li>
            </ul>
        </div>
        <div v-else>
            not found any resualt
        </div>
        <div v-if="isSearching ==false">
            <pagination
            :data="posts"
            @pagination-change-page="getPost"
        ></pagination>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: {},
            searchInput: "",
            isSearching: false
        };
    }, //end of data
    mounted() {
        this.getPost();
    }, //end of mmounted
    watch: {
        searchInput(x) {
            console.log("c:", x);
            axios
                .get("api/postSearch/" + x)
                .then(res => {
                    if (res.data) {
                        this.posts.data = res.data;
                        this.isSearching = true;
                    }
                    console.log();
                })
                .catch(err => {
                    console.log(err);
                });
        } //end of searchInput
    },
    methods: {
        getPost(page) {
            axios
                .get("api/posts?page=" + page)
                .then(res => {
                    this.posts = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        } //end of getPost
    }
};
</script>
