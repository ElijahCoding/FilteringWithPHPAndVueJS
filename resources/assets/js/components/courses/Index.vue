<template>
  <div class="row justify-content-center">
    <div class="col-sm-3">
      <filters endpoint="/api/courses/filters"></filters>
    </div>

    <div class="col-sm-9">
      <div class="card card-default">
        <div class="card-body">
          <template v-if="courses.length">
            <course v-for="course in courses" :course="course" :key="course.id"></course>
            <pagination :meta="meta" v-on:pagination:switched="getCourses"></pagination>
          </template>

          <template v-else>
            No results found
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import queryString from 'query-string'
    import Course from './partials/Course'
    import Pagination from '../pagination/Pagination'
    import Filters from './partials/Filters'

    export default {
        components: {
            Course,
            Pagination,
            Filters
        },
        data () {
            return {
                courses: [],
                meta: null
            }
        },
        mounted () {
            this.getCourses()
        },
        watch: {
            '$route.query': {
                handler (query) {
                    this.getCourses(1, query)
                },
                deep: true
            }
        },
        methods: {
            getCourses(page = this.$route.query.page, filters = this.$route.query) {
                axios.get('/api/courses', {
                    params: {
                        page,
                        ...filters
                    }
                }).then((response) => {
                    this.courses = response.data.data
                    this.meta = response.data.meta
                })
            }
        }
    }
</script>
