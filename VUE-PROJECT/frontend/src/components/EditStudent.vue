<template>
  <div>
    <h2>Edit Student</h2>
    <form @submit.prevent="submitForm">
      <label>Name:</label>
      <input type="text" v-model="name" required>
      <label>Email:</label>
      <input type="email" v-model="email" required>
      <label>Course:</label>
      <input type="text" v-model="course" required>
      <button type="submit">Update</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      id: this.$route.params.id,
      name: '',
      email: '',
      course: ''
    };
  },
  created() {
    axios.get(`http://localhost/student-management/index.php?action=list&id=${this.id}`)
      .then(response => {
        this.name = response.data.name;
        this.email = response.data.email;
        this.course = response.data.course;
      });
  },
  methods: {
    submitForm() {
      const studentData = {
        id: this.id,
        name: this.name,
        email: this.email,
        course: this.course,
        action: 'update'
      };

      axios.post('http://localhost/student-management/index.php', studentData)
        .then(response => {
          this.$router.push({ name: 'studentsList' });
        })
        .catch(error => {
          console.error('There was an error!', error);
        });
    }
  }
};
</script>
