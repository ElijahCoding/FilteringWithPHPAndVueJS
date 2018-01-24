<template>
  <div class="row justify-content-center">
    <div class="col-sm-3">
      <filters endpoint="/api/courses/filters"></filters>
    </div>

    <div class="col-sm-9">
      <div class="card card-default">
        <div class="card-body">
          <course v-for="course in courses" :course="course" :key="course.id"></course>
          <pagination :meta="meta" v-on:pagination:switched="getCourses"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Course from './partials/Course.vue';
  import Pagination from '../pagination/Pagination.vue';
  import Filters from './partials/Filters.vue';

  export default {
    components: {
      Course,
      Pagination,
      Filters
    },

    data() {
      return {
        courses: [],
        meta: {}
      }
    },

    mounted () {
      this.getCourses()
    },

    methods: {
      getCourses (page = this.$route.query.page) {
        axios.get('/api/courses', {
          params: {
            page: page
          }
        }).then((response) => {
          this.courses = response.data.data
          this.meta = response.data.meta
        })
      }
    }
  }
</script>
