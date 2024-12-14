<template>
  <div class="container mt-5">
    <h1>{{ user ? 'Edit User' : 'Add User' }}</h1>
    <form @submit.prevent="submitForm">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input v-model="form.name" type="text" class="form-control" />
        <!-- Display validation error if it exists -->
        <span v-if="errors.name" class="text-danger">{{ errors.name }}</span>
      </div>
      
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input v-model="form.email" type="email" class="form-control" />
        <!-- Display validation error if it exists -->
        <span v-if="errors.email" class="text-danger">{{ errors.email }}</span>
      </div>
      
      <div class="mb-3" v-if="!user">
        <label class="form-label">Password</label>
        <input v-model="form.password" type="password" class="form-control" />
        <!-- Display validation error if it exists -->
        <span v-if="errors.password" class="text-danger">{{ errors.password }}</span>
      </div>
      
      <button type="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  props: {
    user: Object,
  },
  data() {
    return {
      form: {
        name: this.user?.name || '',
        email: this.user?.email || '',
        password: '',
      },
      errors: {},  // Initialize an empty errors object
    };
  },
  methods: {
   submitForm() {
  const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
  
  // Check if the CSRF token meta tag exists
  if (csrfTokenElement) {
    const csrfToken = csrfTokenElement.getAttribute('content');
    if (this.user) {
      Inertia.put(`/users/${this.user.id}`, this.form, {
        headers: {
          'X-CSRF-TOKEN': csrfToken,
        },
        onError: (errors) => {
          this.errors = errors;
        },
      });
    } else {
      Inertia.post('/userscreate', this.form, {
        headers: {
          'X-CSRF-TOKEN': csrfToken,
        },
        onError: (errors) => {
          this.errors = errors;
        },
      });
    }
  } else {
    console.error("CSRF token meta tag not found!");
    // Optionally, handle the error if CSRF token is missing
  }
}

  },
};
</script>
