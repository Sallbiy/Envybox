<template>
    <div class="container p-4">
        <div class="mx-auto p-4" style="width:50%;">
            <form @submit.prevent="addPost">
                <div class="form-group">
                    <label>Name</label>
                    <input v-model="bid.name" class="form-control"
                           placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input v-model="bid.phone_number" class="form-control" type="tel"
                           pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}"
                           placeholder="+7 XXX-XX-XX" required>
                </div>
                <div class="form-group">
                    <label>Appeal</label>
                    <textarea v-model="bid.appeal" class="form-control"
                              placeholder="Пожелание" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">Пожелание</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="el in bidData" :key="el.id">
                <td>{{ el.name }}</td>
                <td>{{ el.phone_number }}</td>
                <td>{{ el.appeal }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "BidComponent",
    data() {
        return {
            bidData: [],
            bid: {
                name: '',
                phone_number: '',
                appeal: '',
            },
        }
    },
    mounted() {
        this.getPost();
    },
    methods: {
        getPost() {
            axios.get('/api/addBid')
                .then(res => this.bidData = res.data)
                .catch(error => {
                    console.log(error);
                })
        },
        addPost() {
            axios.post('/api/addBid', {
                name: this.bid.name,
                phone_number: this.bid.phone_number,
                appeal: this.bid.appeal,
            })
                .then(res => {
                    this.bid.name = ''
                    this.bid.phone_number = ''
                    this.bid.appeal = ''
                    this.getPost()
                    console.log(res);
                    this.$fire({
                        title: "Успешно",
                        text: "Успешный успех тестового:)",
                        type: "success",
                        timer: 3000
                    })
                })
                .catch(error => console.log(error))
        },
    }
}
</script>

<style scoped>

</style>
