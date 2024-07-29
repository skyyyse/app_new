import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:new_app/controller/post_controller.dart';
import 'package:new_app/controller/token.dart';
import 'package:new_app/model/post_model.dart';

class like_controller extends GetxController {
  post_controller post=Get.put(post_controller());
  token_controller token=Get.put(token_controller());
  var like = <Post>[].obs;
  void addToFavorites(Post item) {
    like.add(item);
  }
  void removeFromFavorites(Post item) {
    like.remove(item);
  }
  bool isFavorite(Post item) {
    return like.contains(item);
  }
  void likeorunlike(String id) async {
    final url = 'http://10.0.2.2:8000/api/like?id=$id';
    try {
      final response = await http.get(
        Uri.parse(url),
        headers: {
          "Authorization": "Bearer ${token.data['token']}",
          'Content-Type': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        post.fetchPosts();
        // Get.snackbar('Sucess', 'Like ');
      } else {
        Get.snackbar('Error', 'Failed to fetch posts');
      }
    } catch (e) {
      print(e);
    }
  }
}
