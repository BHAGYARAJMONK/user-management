<template>
  <div class="container mt-5">
    <h1>User List</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <button @click="editUser(user.id)" class="btn btn-primary">Edit</button>
            <button @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  props: {
    users: Array,
  },
  methods: {
    editUser(id) {
      Inertia.get(`/users/${id}`);
    },
    deleteUser(id) {
      if (confirm('Are you sure?')) {
        Inertia.delete(`/users/${id}`);
      }
    },
  },
};
</script>
