import axios from "axios";
import {ref} from "vue";

export default function useStudents(){

    const twinnerslist  = ref([]);
    const getUser = async () => {
        let response = await axios.get('/twinners').catch(err => console.log(err));
        twinnerslist.value = response.data.twinners;
    }

    const getImageUrl = (urlImage : string) => {
        return 'storage/' + urlImage;
    }

    return {
        getUser,
        getImageUrl,
        twinnerslist
    }
}
