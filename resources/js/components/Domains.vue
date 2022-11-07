<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Домен</th>
            <th>Статус</th>
            <th>Дата окончании регистрации</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="domain in domains" :key="domain.id">
            <td>{{ domain.url }}</td>
            <td>{{ domain.status }}</td>
            <td>{{ domain.end }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        domains: Array
    }
}
</script>
