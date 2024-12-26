<template>
  <div>
    <h2>Students List</h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
      </tr>
      <tr v-for="student in students" :key="student.id">
        <td>{{ student.name }}</td>
        <td>{{ student.email }}</td>
        <td>{{ student.course }}</td>
        <td>
          <button @click="editStudent(student)">Edit</button>
          <button @click="deleteStudent(student.id)">Delete</button>
        </td>
      </tr>
    </table>
    <button @click="createStudent">Create Student</button>
  </div>
</template>

<script>
import axios from 'axios';
import CreateStudent from './CreateStudent.vue';

export default {
  data() {
    return {
      students: []
    };
  },
  created() {
    this.fetchStudents();
  },
  methods: {
    fetchStudents() {
      axios.get('http://localhost/student-management/index.php?action=list')
        .then(response => {
          this.students = response.data;
        })
        .catch(error => {
          console.error('There was an error!', error);
        });
    },
    deleteStudent(id) {
      axios.post('http://localhost/student-management/index.php', { action: 'delete', id: id })
        .then(response => {
          this.fetchStudents(); // Re-fetch the students after deletion
        });
    },
    editStudent(student) {
      this.$router.push({ name: 'editStudent', params: { id: student.id } });
    },
    createStudent() {
      this.$router.push({ name: 'createStudent' });
    }
  }
};
</script>
