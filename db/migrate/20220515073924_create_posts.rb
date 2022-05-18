class CreatePosts < ActiveRecord::Migration[7.0]
  def change
    create_table :posts do |t|
      t.text :title, null: false
      t.text :slug, null: false
      t.text :description
      t.text :content
      t.boolean :published, default: false
      t.boolean :pinned, default: false

      t.timestamps
    end
    add_index :posts, :slug, unique: true
  end
end
