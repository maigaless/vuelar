<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div
            class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md"
        >
            <h2 class="text-2xl font-bold text-center">Create an Account</h2>
            <form @submit.prevent="register" class="space-y-4">
                <div class="mb-4">
                    <label
                        for="name"
                        class="block text-gray-700 text-sm font-bold mb-2"
                        >Name:</label
                    >
                    <input
                        type="text"
                        id="name"
                        v-model="name"
                        @blur="onBlurName"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="John Doe"
                    />
                    <p v-if="nameError" class="text-red-500 text-sm">
                        {{ nameError }}
                    </p>
                </div>
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-gray-700 text-sm font-bold mb-2"
                        >Email:</label
                    >
                    <input
                        type="email"
                        id="email"
                        v-model="email"
                        @blur="onBlurEmail"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter your email"
                    />
                    <p v-if="emailError" class="text-red-500 text-sm">
                        {{ emailError }}
                    </p>
                </div>
                <div class="mb-4">
                    <label
                        for="password"
                        class="block text-gray-700 text-sm font-bold mb-2"
                        >Password:</label
                    >
                    <input
                        type="password"
                        id="password"
                        v-model="password"
                        @blur="onBlurPassword"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter your password"
                    />
                    <p v-if="passwordError" class="text-red-500 text-sm">
                        {{ passwordError }}
                    </p>
                </div>
                <div class="mb-4">
                    <label
                        for="passwordConfirmation"
                        class="block text-gray-700 text-sm font-bold mb-2"
                        >Confirm Password:</label
                    >

                    <input
                        type="password"
                        id="passwordConfirmation"
                        v-model="passwordConfirmation"
                        @blur="onBlurPasswordConfirmation"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Confirm your password"
                    />
                    <p
                        v-if="passwordConfirmationError"
                        class="text-red-500 text-sm"
                    >
                        {{ passwordConfirmationError }}
                    </p>
                </div>

                <div class="mb-4">
                    <label
                        for="pincode"
                        class="block text-gray-700 text-sm font-bold mb-2"
                        >PIN Code:</label
                    >

                    <input
                        type="text"
                        id="pincode"
                        v-model="pincode"
                        @blur="onBlurPincode"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter your PIN code"
                    />
                    <p v-if="pincodeError" class="text-red-500 text-sm">
                        {{ pincodeError }}
                    </p>
                </div>
                <button
                    type="submit"
                    class="w-full py-2 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300"
                >
                    Register
                </button>
                <div v-if="errorMessage" class="mt-2 text-red-500 text-sm">
                    {{ errorMessage }}
                </div>
            </form>
            <p class="text-center text-sm text-gray-600">
                Already have an account?
                <router-link to="/login" class="text-blue-600 hover:underline"
                    >Login</router-link
                >
            </p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            passwordConfirmation: '',
            errorMessage: "",
            nameError: "",
            emailError: "",
            passwordError: "",
            passwordConfirmationError: '',
            pincodeError: "",
        };
    },
    methods: {
        onBlurName() {
            this.nameError = "";
            if (this.name.trim() === "") {
                this.nameError = "Name is required.";
            }
        },
        onBlurEmail() {
            this.emailError = "";
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(this.email)) {
                this.emailError = "Please enter a valid email address.";
            }
        },
        onBlurPassword() {
            this.passwordError = "";
            if (this.password.length < 6) {
                this.passwordError =
                    "Password must be at least 6 characters long.";
            }
        }, onBlurPasswordConfirmation() {
            this.passwordConfirmationError = '';
            if (this.passwordConfirmation !== this.password) {
              this.passwordConfirmationError = 'Passwords do not match.';
            }
            },
        onBlurPincode() {
            this.pincodeError = "";

            if (!/^\d+$/.test(this.pincode)) {
                this.pincodeError = "PIN code must be a number.";
            }
        },
        validateInputs() {
            this.nameError = "";
            this.emailError = "";
            this.passwordError = "";
            let isValid = true;

            // Validate name
            if (this.name.trim() === "") {
                this.nameError = "Name is required.";
                isValid = false;
            }

            // Validate email format
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(this.email)) {
                this.emailError = "Please enter a valid email address.";
                isValid = false;
            }

            // Validate password length
            if (this.password.length < 6) {
                this.passwordError =
                    "Password must be at least 6 characters long.";
                isValid = false;
            }

            return isValid;
        },
        async register() {
            console.log("register process started");
            this.errorMessage = ""; // Reset error message
            if (!this.validateInputs()) {
                return; // Stop if validation fails
            }

            try {
                const response = await axios.post(
                    "http://127.0.0.1:8000/api/register",
                    {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation:this.passwordConfirmation,
                        pincode: this.pincode
                    }
                );

                // Handle successful registration (e.g., redirect to login page)
                this.$router.push("/login"); // Change to your desired route
            } catch (error) {
                if (error.response && error.response.data.message) {
                    this.errorMessage = error.response.data.message; // Display error message from API
                } else {
                    this.errorMessage =
                        "An error occurred. Please try again later.";
                }
            }
        },
    },
};
</script>

<style scoped>
/* You can add additional styles here if needed */
</style>
