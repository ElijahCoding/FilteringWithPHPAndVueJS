<template>
  <div class="row justify-content-center">
    <div class="col-sm-3">
      filters
    </div>

    <div class="col-sm-9">
      <div class="card card-default">
        <div class="card-body">
          <course v-for="course in courses" :course="course" :key="course.id"></course>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Course from './partials/Course.vue';

  export default {
    components: {
      Course
    },

    data() {
      return {
        courses: []
      }
    },

    mounted () {
      axios.get('/api/courses').then((response) => {
        this.courses = response.data.data
      })
    }
  }
</script>
