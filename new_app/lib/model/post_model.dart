import 'package:new_app/model/like_model.dart';
import 'package:new_app/model/user_model.dart';
class Post {
  final int id;
  final String title;
  final String description;
  final String image;
  final int userId;
  final int commentCount;
  final int likeCount;
  User user;
  List<Like> like;
  Post({
    required this.id,
    required this.title,
    required this.description,
    required this.image,
    required this.userId,
    required this.commentCount,
    required this.likeCount,
    required this.user,
    required this.like,
  });

  factory Post.fromJson(Map<String, dynamic> json) {
    return Post(
      id: json['id'],
      title: json['title'],
      description: json['description'],
      image: json['image'],
      userId: json['user_id'],
      commentCount: json['comment_count'],
      likeCount: json['like_count'],
      user: User.fromJson(json['user']),
      like: (json['like'] as List).map((like) => Like.fromJson(like)).toList(),
    );
  }
}


