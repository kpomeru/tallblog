# TallBlog

![TallBlog logo](/public/images/tallblog-post-banner.svg "TallBlog Logo")

## An advanced TALL Stack Blog

**Tallblog** is a blog project built on Laravel and simple stacks/technologies. It implements the TALL stack, throughout the application. I would be covering the basics of how I implemented this project; this is on the assumption that you (a potential) full-stack developer are an intermediate or a beginner with a preliminary knowledge of Laravel, AlpineJS, Livewire and TailwindCSS.
This article explains what I have done in an overview format, not necessarily a tutorial on my implementation. Because I believe in an agile way of doing things, my early idea was modified during implementation.


## Concept

I believe software engineering profer solutions to problems in different ways. 1 + 1 is 2 so is 8 - 6, and they are both correct scenarios. That said, in the build-up to Tallblog, I used AlpineJS and Livewire interchangeably for real-time updates. TailwindCSS undeniably has become a predominant CSS framework in recent times. When combined with AplineJS and Livewire data state (and management) it becomes a very powerful tool.

My approach is, guests can view all posts on the blog but they must be members to comment or like posts/comments. The super_admin gets to move members between roles, e.g contributor, which would allow for post creations. Every post is owned by a user and belongs to a category; they can be published at creation or published later when the author dims it fit.

### Features include

- Authentication feature
- Post-CRUD feature
- Comment feature
- Likes feature for posts and comments.
- Subscription feature for categories and author (contributors)

### Roles

- super_admin: Can assign roles and do everything below.
- admin (admin@tallblog.test): Cannot do super_admin tasks but can delete comments and everything below.
- contributor (contributor@tallblog.test): Can make a post and do everything below.
- subscriber (default role) (subscriber@tallblog.test): Can comment and like posts/comments.

All roles have a corresponding account email to try out TallBlog using the password "Pa$$w0rd"


## Implementation

### Installation and setup

- Installed a brand new laravel project and used a TALL framework laravel preset to speed things up, which I got from Laravel Frontend Presets.
- I added Hericons for my icon design system and added Trix-Editor to the project.

### Models and Relationships

From models and migration, I set up users first, then categories, posts, comments and likes. I also included a subscription relationship between users and a between users and categories.

These models gave a guide as to how I implemented each feature and in the order I did.

- User management feature with authentication
- Seeded categories that posts will belong to and users can subscribe to.
- Included comments, and then likes.
- Like feature is meant to have a polymorphic one-to-many relationship with posts and comments.
- I created seeders and factories for TallBlog and utilised free image placeholder API resources out there.
- I assigned a random username for every user who registers on TallBlog, and moved the "fakerphp/faker" package into the required production dependencies list.

TallBlog implements email notifications used in account verification, password change and new comments on posts.

## Queue Worker

When contributors get comments and/or responses to their posts we would want them notified. The essence is to see if they need to reply to such comments or if they should be deleted. We did not implement an approval workflow for the comment system and it is imperative we add an option to delete offensive entries.

**Heads up**, I added a background task that would clear new posts, images, comments and likes twice daily.
