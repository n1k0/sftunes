CREATE TABLE comment (id BIGINT AUTO_INCREMENT, fortune_id BIGINT NOT NULL, author VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, content TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX fortune_id_idx (fortune_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE fortune (id BIGINT AUTO_INCREMENT, author VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, content TEXT NOT NULL, votes BIGINT DEFAULT 0, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX author_idx_idx (author), INDEX votes_idx_idx (votes), INDEX author_votes_idx_idx (author, votes), INDEX date_idx_idx (created_at), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE comment ADD CONSTRAINT comment_fortune_id_fortune_id FOREIGN KEY (fortune_id) REFERENCES fortune(id) ON DELETE CASCADE;
