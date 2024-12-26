<template>
  <div>
    <h2>Create Student</h2>
    <form @submit.prevent="submitForm">
      <label>Name:</label>
      <input type="text" v-model="name" required>
      <label>Email:</label>
      <input type="email" v-model="email" required>
      <label>Course:</label>
      <input type="text" v-model="course" required>
      <button type="submit">Create</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      course: ''
    };
  },
  methods: {
    submitForm() {
      const studentData = {
        name: this.name,
        email: this.email,
        course: this.course,
        action: 'create'
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
