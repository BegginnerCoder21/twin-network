import { ref } from 'vue';

export default function useReaction(){

    const isLike = ref(
        {
            isLikes : false,
            nbrLike : 23
        });

    const like = () => {
        isLike.value.isLikes = !isLike.value.isLikes;
    
        isLike.value.nbrLike = isLike.value.isLikes ? isLike.value.nbrLike +=1 : isLike.value.nbrLike -=1;
    }
    
    return {
        like,
        isLike
    }
}