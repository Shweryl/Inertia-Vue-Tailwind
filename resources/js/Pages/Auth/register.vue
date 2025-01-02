<script setup>
import { reactive } from "vue";
import { useForm } from '@inertiajs/vue3';
import inputText from '../Components/inputText.vue'


  let form =  useForm({
    name : null,
    email : null,
    password : null,
    password_confirmation : null,
    image : null,
    preview : null
  })

  let submit = () => {
    form.post("/register", {
        onError : () => form.reset('password', 'password_confirmation') //reset only password and pass-con field if errors occcur
    })
  }

  let change = (e) => {
    form.image = e.target.files[0];
    form.preview = URL.createObjectURL(e.target.files[0]) // creating upload image preview
  }

</script>
<template>
  <Head title="Register" />
  <div class="max-w-screen-lg flex justify-center mx-auto">
    <div class="w-2/4 bg-purple-200 mt-5 p-5 rounded-md shadow-md">
      <h1 class=" text-center text-2xl font-bold">Register A Form</h1>
      <div class="mt-3">
        <form action="" @submit.prevent="submit" class="space-y-3">
          <!-- Upload Image UI -->
          <div class="grid place-items-center">
              <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
                <label for="image" class="absolute inset-0 grid content-end cursor-pointer">
                  <span class="bg-white/70 pb-2 text-center">Image</span>
                </label>
                <input type="file" class="" id="image" @input="change" hidden>
                <img :src="form.preview" class="object-cover w-28 h-28" alt="">
              </div>
              <p>
                <small class="text-red-500">{{form.errors.image}}</small>
              </p>
          </div>
          <!-- Upload Image UI -->
          <inputText name="Name" v-model="form.name" :message="form.errors.name"/>
          <inputText name="Email" type='email' v-model="form.email" :message="form.errors.email"/>
          <inputText name="Password" type='password' v-model="form.password" :message="form.errors.password"/>
          <inputText name="Confirm Password" type='password' v-model="form.password_confirmation" :message="form.errors.password"/>
          <div class="flex justify-between items-center">
            <p class="font-semibold">
              Already a user? <Link :href="route('login')" class="text-purple-700">Login</Link>
            </p>
            <!-- disable buttom when submitting form -->
            <button type="submit" :disabled="form.processing" class="bg-purple-700 py-2 px-3 rounded-md text-white hover:bg-purple-800 hover:ring-purple-200">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
