import 'dart:convert';
import 'package:get/get.dart';
import 'package:get/get_state_manager/get_state_manager.dart';
import 'package:new_app/controller/token.dart';
import 'package:new_app/model/post_model.dart';
import 'package:http/http.dart' as http;
class post_controller extends GetxController {
  var posts = <Post>[].obs;
  var loading = false.obs;
  token_controller token=Get.put(token_controller());
  @override
  void onInit() {
    fetchPosts();
    super.onInit();
  }

  Future<void> fetchPosts() async {
    final url = 'http://10.0.2.2:8000/api/post/get';
    try {
      loading.value = true;
      final response = await http.get(
        Uri.parse(url),
        headers: {
          "Authorization": "Bearer ${token.data['token']}",
          'Content-Type': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        loading.value = false;
        final List<dynamic> jsonList = json.decode(response.body)['post'];
        posts.assignAll(jsonList.map((json) => Post.fromJson(json)).toList());
      } else {
        Get.snackbar('Error', 'Failed to fetch posts');
      }
    } catch (e) {
      Get.snackbar('Error', 'An error occurred: $e');
      print(e);
    } finally {
      loading.value = false;
    }
  }
}
