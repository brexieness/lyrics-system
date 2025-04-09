<template>
    <div>
        <h1 class="text-2xl font-semibold mb-4">Song List</h1>
        <div v-if="songs.length === 0" class="text-gray-500">No songs available</div>
        <div v-else>
            <div v-for="song in songs" :key="song.id" class="mb-4">
                <img :src="song.cover_image" alt="Cover Image" class="w-20 h-20 object-cover">
                <h3 class="text-xl font-bold">{{ song.title }}</h3>
                <p>{{ song.lyrics.slice(0, 100) }}...</p>
                <router-link :to="'/song/' + song.id" class="text-blue-600">View Full Song</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            songs: []
        };
    },
    mounted() {
        this.fetchSongs();
    },
    methods: {
        async fetchSongs() {
            try {
                const response = await axios.get('/api/songs');
                this.songs = response.data;
            } catch (error) {
                console.error('Error fetching songs:', error);
            }
        }
    }
}
</script>

<style scoped>
/* Add any specific styling for the SongList component here */
</style>
