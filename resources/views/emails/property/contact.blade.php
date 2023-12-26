<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a ete fait pour le bien <a href="{{route('property.show',['slug'=>$property->getSlug(),'property'=>$property])}}">{{$property->title}}</a>.

-Prenom : {{$data['firstname']}}<br>
-Nom : {{$data['lastname']}}<br>
-Telephone : {{$data['phone']}}<br>
-Email : {{$data['email']}}<br>

**Message :**<br>
{{$data['message']}}

</x-mail::message>
